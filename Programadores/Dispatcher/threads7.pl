#!/bin/usr/perl

#Libraries
#Libraries necessary for the correct implementation

use threads
use threads::shared
use IPC::Open3;

#GlobaL VARIABLES
#Keeps the parameters values

@arr_thr = ();

#Code

#The main code controls the flow of function callin

#-----------------------------------------------------------------

#startin php service
	$thrphp = threads->new(\&startphp);
	$thrphp->join;

#keep pid

	my $temp1 = open3(\*WRITER, \*READER, \*ERROR, $cmd);
	
	waitpid( $temp, 0 ) or die "$!\n";
	
	push (@arr_thr, $temp); #keep record of php service pid

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

sub startphp(){

	system('HELLO!'); #insert on system the command and parameters for starting php service


}

sub startcas(){

	system('GOODBYE!'); #insert on system the command and parameters for starting cassandra service


}