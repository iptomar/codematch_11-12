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

#commands to use

##open directory
#opendir(DIR, 'd:\Escola\PSI\codematch\Programadores\Dispatcher') or die ("Unable to open directory");
##this line gets rid of . and ..<br>
#@files = grep !/^\./, readdir(DIR);
##close directory
#closedir(DIR);
##create array of threads
#my @threads = ();
##extract all filenames
#foreach $file (sort @files) {
#	#extract file extension
#	my $ext = ($file =~ m/([^.]+)$/)[0];
#	#if file extension equals php
#	if ($ext eq "php" or $ext eq "PHP"){
#		#create php command
#		my $cmd = "php $file"
#		#push new thread into threads array and execute comand
#		push (@threads, threads->new(sub{executa($cmd)}));
#		print "Thread $i Started!\n Command: $cmd \n";
#	}
#}


my $cmd1 = "php bing_github.php";

my $cmd2 = "php bing_launchpad.php";

my $cmd3 = "php bing_sourceforge.php";

my $cmd4 = "php yahoo_github.php";

my $cmd5 = "php yahoo_launchpad.php";

my $cmd6 = "php yahoo_sourceforge.php";


#Start all threads

$thr1 = threads->new(sub{executa($cmd1)});
#Starts $thread 1
print "Thread 1 Started!\n Command: $cmd1 \n";

$thr2 = threads->new(sub{executa($cmd2)}); 
#Starts $thread 2
print "Thread 2 Started!\n Command: $cmd2 \n";

$thr3 = threads->new(sub{executa($cmd3)}); 
#Starts $thread 3
print "Thread 3 Started!\n Command: $cmd3 \n";

$thr4 = threads->new(sub{executa($cmd4)});
#Starts $thread 4
print "Thread 4 Started!\n Command: $cmd4 \n";

$thr5 = threads->new(sub{executa($cmd5)});
#Starts $thread 5
print "Thread 5 Started!\n Command: $cmd5 \n";

$thr6 = threads->new(sub{executa($cmd6)});
#Starts $thread 6
print "Thread 6 Started!\n Command: $cmd6 \n";

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