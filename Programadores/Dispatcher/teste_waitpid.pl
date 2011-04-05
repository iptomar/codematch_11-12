#!/usr/bin/perl

use IPC::Open3;

my ($wrt, $rdr, $err);
my $cmd = "cd c:\ "; #comando a efectuar
my $pid = open3($wrt, $rdr, $err, $cmd); #links d escrita, leitura e de erros

waitpid( $pid, 0 ) or die "$!\n"; #esperar que o processo acabe

my $ret = $?; #guarda o estado final

if($ret != 0){
	print ("\nOcorreu um erro, verifique os registos, retorno:".$ret.".\n");    #se ocorre um erro devolve o código do erro
} else {
	print ("Sucesso!!\n"); #senão devolve mensagem de sucesso
}


