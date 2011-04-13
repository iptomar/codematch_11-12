#!/bin/usr/perl

#Libraries
#Libraries necessary for the correct implementation

use threads;
use threads::shared;
use IPC::Open3;

#GlobaL VARIABLES


my ($command,$flag1,$flag2);



#Code

#The main code controls the flow of function callin

	$flag1 = 0;
	$flag2 = 1;
	
	$thr1 = threads->new(\&escrita("1"));
	print "tzsete";
	
	$thr2 = threads->new(\&escrita("2"));		

	
	$thr3 = threads->new(\&escrita("3"));
		

	
	while($flag2 != 0){
	
		
		
		
		
	}


#Functions


sub escrita(){

	$x = 10;

	while($x > 0){
		sleep 2;
		print "Ola, thread $_[0], interracao $x \n\n";
		$x = $x - 1;
	}

}