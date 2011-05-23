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

$thr0 = threads->new(\&control);

$thr0->join;

#Functions


sub escrita(){

	$x = 10;

	while($x > 0){
		
		print "Ola, thread $_[0], interracao $x \n\n";
		$x = $x - 1;
	}

}



sub control(){
	
	$flag1 = 0;
	$flag2 = 1;
	
	$thr1 = threads->new(\&escrita("1"));
		
	
	$thr2 = threads->new(\&escrita("2"));		

	
	$thr3 = threads->new(\&escrita("3"));
		

	
	while($flag2 != 0){
	
		
		
		if($thr1->is_joinable()){	
		
			$thr1->join;
			print "Thread 1 terminada";
			
		
		} 
		
		if($thr2->is_joinable()){	
		
			$thr2->join;
			print "Thread 2 terminada";
			
			
		
		} 
		
		if($thr3->is_joinable()){	
		
			$thr3->join;
			print "Thread 3 terminada";
			
		
		}
		
	}
	
	SAIR:



}