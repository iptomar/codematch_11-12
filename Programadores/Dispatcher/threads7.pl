#!/bin/usr/perl

#Libraries
#Libraries necessary for the correct implementation
use threads
use threads::shared

#GlobaL VARIABLES
#Keeps the parameters values

@arr_thr = ();

#Code
#The main code controls the flow of function callin

#startin php service
	$thrphp = threads->new(\&startphp);
	$thrphp->join;

#keep pid
	push (@arr_thr, ); #keep record of php service pid
	
	$thrphp->detach;

#startin cassandra service
	$thrcas-> threads->new(\&startcas);
	$thrcas->join;
	
#keep pid
	push (@arr_thr, ); #keep record of cassandra service pid
	
	$thrcas->detach;


#Functions
#Sub functions posses the code for init, regulate and terminate threads(Services)

sub startphp(){

	system('HELLO!'); #insert on system the command and parameters for starting php service


}

sub startcas(){

	system('GOODBYE!'); #insert on system the command and parameters for starting cassandra service


}