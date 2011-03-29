#!/usr/bin/perl

#Pedro Miguel Aparicio Dias

use strict;
use File::Basename;
use Switch;
use IPC::Open3;
use English '-no_match_vars';


my($path,$file,$dir,$tmp,$cmd,$dest);
my $start = `pwd`;
chomp($start);
my $downloads   = $start."/installer";

my @name;
my @version;
my $downloaded = 0;
my $extracted = 0;
my $compiled = 0;

open (MYOUT, '>', $downloads."/output.log");
open (MYERR, '>', $downloads."/error.log");

my $editor = $ENV{'EDITOR'};

if (!-d $downloads) {
	system("mkdir $downloads");
}

my $cpus = `cat /proc/cpuinfo | grep processor | awk '{a++} END {print a}'`;
my $banner = "-- INSTALADOR DE PACOTES v0.1 --\nISCTE FSOCA- 2009\nPedro Miguel Aparicio Dias\nCPU Cores: ".$cpus."\n";

system("clear");
print $banner;

para();

while(1){
	my $option = menu();

	switch($option){
		case 1 {
			menu_download();
		}
		case 2 {
			if($downloaded == 1) {
				menu_descomprime();
			} else {
				print("\nDownload não efectuado!\n");
				para();
			}
		}
		case 3 {
			if($extracted == 1) {
				menu_compilacao();
			} else {
				print("\nExtraccao não efectuada!\n");
				para();
			}
		}
		case 4 {
			if($compiled == 1) {
				menu_instalacao();
			} else {
				print("\nCompilacao não efectuada!\n");
				para();
			}
		}
		case 5 {
			system("clear");
			print("---> Log de saida <---\n\n");
			if(length($editor) > 1){
				system("$editor $downloads/output.log");			
			} else {
				system("vi $downloads/output.log");
			}
		}
		case 6 {
			system("clear");
			print("---> Log de erros <---\n\n");
			if(length($editor) > 1){
				system("$editor $downloads/error.log");			
			} else {
				system("vi $downloads/error.log");
			}
		}
		case 7 {
			if($downloaded == 1) {
				system("clear");
				print("---> Construir RPM <---\n\n");
				construir_rpm();
			} else {
				print("\nDownload não efectuado!\n");
				para();		
			}
		}
		default {
			sair();		
		}
	}
}

#opcao de instalacao
sub menu_instalacao
{
	cleanf();	
	system("clear");
	if($EUID == 0){
		print("---> A instalar o pacote! <---\n\n");
		$cmd = "cd ".$downloads."/".$dir."; make install";
		executa();
	} else {
		print("\nUtilizador actual sem permissoes...\n");	
		if (-e "/usr/bin/sudo") {
			$cmd = "cd ".$downloads."/".$dir."/; sudo make install";
		} else {
			$cmd = "su -; cd ".$downloads."/".$dir."/; make install";				
		}
		executa();		
	}
	para();
}

#opcao de compilacao
sub menu_compilacao
{
	cleanf();
	system("clear");
	print("---> A compilar o pacote! <---\n\n");

	print("\n---> Configuracao! <---\n\n");
	print("Prefix = ");	
	$dest = <STDIN>;
	chomp($dest);
	if(length($dest) < 1){
		$cmd = "cd ".$downloads."/".$dir."/; ./configure";
	} else {
		$cmd = "cd ".$downloads."/".$dir."/; ./configure --prefix=".$dest;
	}

	print("\nAguarde...\n");

	my $retc = executa();

	if($retc == 0) {
		print("\n---> Compilacao! <---\n\n");
		print("\nAguarde...\n");
		$cmd = "cd ".$downloads."/".$dir."/; make -j ".$cpus;
		my $ret = executa();
		if($ret == 0){
			$compiled = 1;	
		}
	}
	para();
}

#opcao descomprimir
sub menu_descomprime
{
	cleanf();
	system("clear");
	print("---> A extrair o pacote! <---\nAguarde...\n\n");
	$file = basename("$path");

	chomp($file);

	if(index($file,".bz2") != -1) {
		$cmd = "cd ".$downloads."; /bin/tar xjvf ./".$file;
	} else {
		$cmd = "cd ".$downloads."; /bin/tar xzvf ./".$file;
	}

	my $ret = executa();
	if($ret == 0){
		$extracted = 1;	
	}

	if(index($file,".bz2") != -1) {
		$dir = basename("$file",".tar.bz2");
	} else {
		if(index($file,".tgz") != -1){
			$dir = basename("$file",".tgz");
		} else {
			$dir = basename("$file",".tar.gz");
		}
	}

	chomp($dir);

	para();
}

#opcao download
sub menu_download
{
	cleanf();
	do {
		print("Insira o url do pacote: ");
		$path = <STDIN>;
	} while(index($path,".tar.bz2") == -1 && index($path,".tar.gz") == -1 && index($path,".tgz") == -1);
	system("clear");
	print("\n---> A fazer download do pacote! <---\nAguarde...\n\n");
	$cmd = "cd ".$downloads."; /usr/bin/wget -N ".$path;

	my $ret = executa(1);
	if($ret == 0){
		$downloaded = 1;			
	}
	para();
}

#execucao de chamadas
sub executa
{
	my $pid = open3(\*WRITER, \*READER, \*ERROR, $cmd);

	while( my $output = <READER> ) {
		if($_[0] == 1){
			print "$output";
		}
       		print MYOUT "$output";
	}

	while( my $errout = <ERROR> ) {
		if($_[0] == 1){
			print "$errout";
		}
        	print MYERR "$errout";
	}

	waitpid( $pid, 0 ) or die "$!\n";

	my $ret = $?;
	
	if($ret != 0){
		print ("\nOcorreu um erro, verifique os registos, retorno:".$ret.".\n");	
	} else {
		print ("Sucesso!!\n");
	}

	return $ret;
}

#limpar registos
sub cleanf
{
	close(MYOUT);
	close(MYERR);
	system("rm -rf ".$downloads."/output.log");
	system("rm -rf ".$downloads."/error.log");
	open (MYOUT, '>', $downloads."/output.log");
	open (MYERR, '>', $downloads."/error.log");
}

#espera por enter
sub para
{
	print("\n\nPrima uma tecla para continuar...\n");
	chomp ($tmp = <STDIN>);
}

#menus
sub menu
{
	my $opt;
	if (-e "/usr/bin/dialog") {
		system('dialog --menu "-- INSTALADOR DE PACOTES v0.1 --\nISCTE FSOCA - 2009\nPedro Miguel Aparicio Dias\n\nMenu:" 20 60 8 1 "Download" 2 "Descomprimir" 3 "Compilar" 4 "Instalar" 5 "Registo de saida" 6 "Registo de erros" 7 "Construir RPM" 8 "Sair" 2> .aux');
		$opt = `cat .aux`;
		print ("\n");
	} else {
		system("clear");
		print("-----------------MENU-----------------\n");
		print("1 - Download do pacote.\n");
		print("2 - Descomprimir o pacote.\n");
		print("3 - Compilar o pacote.\n");
		print("4 - Instalar o pacote no sistema.\n");
		print("5 - Mostrar o registo de saída.\n");
		print("6 - Mostrar o registo de errors.\n");
		print("7 - Construir RPM.\n");
		print("8 - Sair.\n");
		print("--------------------------------------\n");
		print("Opcao: ");
		chomp ($opt = <STDIN>);
	}	
	return $opt;
}

#construcao do rpm
sub construir_rpm
{
	if (-e "/usr/bin/rpmbuild") {
		system('mkdir ~/rpmbuild/ 2> /dev/null; mkdir ~/rpmbuild/SOURCES/ 2> /dev/null');

		system("cd $downloads; cp $file ~/rpmbuild/SOURCES/source.z");
		system("cp ./generic.spec $downloads/$dir/");

		@name = split('-', $file);
		@version = split(/\./,$name[1]);

		my ($aux,$v);

		foreach $v (@version) {
			if ($v =~ /^-?\d/) {
				$aux = $aux.".".$v;							
			}
		}

		$aux = reverse($aux);
		chop($aux);
		$aux = reverse($aux);

		&addheader("$downloads/$dir/generic.spec","\%define name $name[0]\n");
		&addheader("$downloads/$dir/generic.spec","\%define version $aux\n");

		print("Spec construido.\n");

		$cmd = "cd ".$downloads."/".$dir."/; rpmbuild -ba generic.spec";
		print("\nA executar o rpmbuild, aguarde...\n");
		my $retc = executa();

		para();
	} else {
		print("Ferramenta rpmbuild inexistente no sistema.")
	}
}

#append para ficheiros
sub addheader{
	my($infile,$header)=@_;
	my $text = do { local( @ARGV, $/ ) = $infile ; <> } ;
	open(FILE,">$infile");
	print FILE $header;
	print FILE $text;
	close FILE;
}

#saida
sub sair
{
	print("Adeus...\n");
	exit 1;
}
