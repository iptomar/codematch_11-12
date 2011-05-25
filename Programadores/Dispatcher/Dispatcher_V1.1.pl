#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso

#Libraries
use IPC::Open3;
use threads;
use threads::shared;


#Variables

open(LOG1,">/home/semiao/public_html/");

#Main Code
menu();
print "\n\n";

#open directory
opendir(DIR, '>Launch/') or die ("Unable to open directory");
#this line gets rid of . and ..<br>
@files = grep !/^\./, readdir(DIR);
#close directory
closedir(DIR);
#create array of threads
my @threads = ();
#extract all filenames
foreach $file (sort @files) {
	#extract file extension
	my $ext = ($file =~ m/([^.]+)$/)[0];
	#if file extension equals php
	if ($ext eq "php" or $ext eq "PHP"){
		#create php command
		my $cmd = "php $file"
		#push new thread into threads array and execute comand
		push (@threads, threads->new(sub{executa($cmd)}));
		#extract number of threads
		my $thr = @threads;
		print "Thread $thr Started!\n Command: $cmd \n";
	}
}

#Functions

#Call - execute a command - returns error code (0 = Fine process execution)

sub executa 
{	
	#saves the command
	my $comm = $_[0];
	
	#write, read and error vars init
	my ($wrt, $read, $err);
	
	#starts the process	
	my $pid = open3($wrt, $read, $err, $comm);
	
	#prints the process id
	print "$comm PID: $pid\n";
	
	#Wait for process to finish
	waitpid( $pid, 0 ) or die "$!\n";

	#saves return value
	my $ret = $?;
	
	#save termination time in log file
		
	#saves and shows script output
	my $output = $wrt;
	print "$comm WRT: $wrt\n";
	
	#State returned
	
	if($ret == 0){
		print "$ret returned - Good execution of process $comm\n";
	}
	
	return $ret;
}

#Menu Function - Print initial menu

sub menu {

	#Save username
	open FH, "whoami|" or die "Failed";
	my @who = qx{"whoami" 2>&1};

	#Draw menu
	print "**********************************************\n";
	print "*                                            *\n";
	print "*            TOLMAI DISPATCHER               *\n";
	print "*               Version 1.0                  *\n";
	print "**********************************************\n";
	print "                                              \n";
	print " 	          Welcome, $who[0]\n             \n";
	print "                                              \n";
	print "**********************************************\n";
}