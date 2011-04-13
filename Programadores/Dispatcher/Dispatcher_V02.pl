#!/bin/usr/perl

#Libraries
#Libraries necessary for the correct implementation

use threads
use threads::shared
use IPC::Open3;

#GlobaL VARIABLES


my ($command);



#Code

#The main code controls the flow of function callin

$thr0 = threads->new(\&control);

#Functions


sub start(){ 
	
	#Function to execute

	my ($wrt, $rdr, $err, $file);
	
	my $file = $_[0]; #comando a efectuar
	
	$cmd = "php $file"; #contruir comando php
	
	my $pid = open3($wrt, $rdr, $err, $cmd); #links d escrita, leitura e de erros
	

	#Waits for termination of thread

	waitpid( $pid, 0 ) or die "$!\n"; #esperar que o processo acabe
	
	my $ret = $?; #guarda o estado final
	
	return $ret;


}

sub control(){
	
	$command = "bing.php";	
	
	$thr1 = threads->new(\&start($command)); #Starts Bing Script
		
	
	
	
	$command = "google.php";	
	
	$thr2 = threads->new(\&start($command)); #Starts Google Script
		

	
	
	$command = "yahoo.php";	
	
	$thr3 = threads->new(\&start($command)); #Starts Yahoo Script
		

	
	while(1){
	
			
		
		if($thr1->is_joinable()){	#tests state of Bing Script
		
			$thr1->join;
			print "Thread 1 terminada";
		
		}
		
		if($thr2->is_joinable()){	#tests state of Google Script
		
			$thr2->join;
			print "Thread 2 terminada";
			
		
		}
		
		if($thr3->is_joinable()){	#tests state of Yahoo Script
		
			$thr3->join;
			print "Thread 3 terminada";
		
		}
	
		
	}
	
	



}