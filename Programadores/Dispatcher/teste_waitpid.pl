#!/usr/bin/perl

use IPC::Open3;

  $cmd = "cd c:\dados "; #comando a efectuar
   
  my $pid = open3(\*WRITER, \*READER, \*ERROR, $cmd);

 	waitpid( $pid, 0 ) or die "$!\n";

	my $ret = $?;

	if($ret != 0){
		print ("\nOcorreu um erro, verifique os registos, retorno:".$ret.".\n");    #se ocorre um erro devolve o c�digo do erro
	} else {
		print ("Sucesso!!\n"); #sen�o devolve mensagem de sucesso
	}
