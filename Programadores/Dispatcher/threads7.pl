#!/bin/usr/perl

#Feito por David Semiao e João Cardoso

#Libraries
#Libraries necessary for the correct implementation

use threads
use threads::shared
use IPC::Open3;

#GlobaL VARIABLES
#Keeps the parameters values

@arr_thr = ();

#Pre determined process position

#Code

#The main code controls the flow of function callin

#-----------------------------------------------------------------

#startin php service
	$thrapache = threads->new(\&startapache);
	$thrphp->join;

#detach from thread
	
	$thrphp->detach;

#-----------------------------------------------------------------
	
#startin cassandra service
	$thrcas-> threads->new(\&startcas);
	$thrcas->join;
	
#keep pid

	my $temp2 = open3(\*WRITER, \*READER, \*ERROR, $cmd);
	
	waitpid( $temp2, 0 ) or die "$!\n";

	push (@arr_thr, ); #keep record of cassandra service pid

#detach from thread

	$thrcas->detach;

#--------------------------------------------------------------------

#Functions

#Sub functions posses the code for init, regulate and terminate threads(Services)

sub startapache(){

	my ($wrt, $rdr, $err);
	my $cmd = "apache restart "; #comando a efectuar
	my $pid = open3($wrt, $rdr, $err, $cmd); #links d escrita, leitura e de erros
	
	#save process id on array structure
	
	@arr_thr[0] = $pid;

	waitpid( $pid, 0 ) or die "$!\n"; #esperar que o processo acabe

	my $ret = $?; #guarda o estado final
	

	if($ret != 0){
		print ("\nOcorreu um erro, verifique os registos, retorno:".$ret.".\n");    #se ocorre um erro devolve o código do erro
	} else {
		print ("Sucesso!!\n"); #senão devolve mensagem de sucesso
	}


}

sub startcas(){

	my ($wrt, $rdr, $err);
	my $cmd = "/opt$ cassandra/bin/cassandra-cli -h localhost"; #comando a efectuar
	my $pid = open3($wrt, $rdr, $err, $cmd); #links d escrita, leitura e de erros
	
	#save process id on array structure
	
	@arr_thr[1] = $pid;

	waitpid( $pid, 0 ) or die "$!\n"; #esperar que o processo acabe

	my $ret = $?; #guarda o estado final
	

	if($ret != 0){
		print ("\nOcorreu um erro, verifique os registos, retorno:".$ret.".\n");    #se ocorre um erro devolve o código do erro
	} else {
		print ("Sucesso!!\n"); #senão devolve mensagem de sucesso
	}


}