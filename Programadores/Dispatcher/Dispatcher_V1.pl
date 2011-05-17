#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso

#Libraries
use IPC::Open3;
use threads;
use threads::shared;
use subs::parallel;

#Variables

#commands to use
my $cmd1 = "php bing_github.php";
my $cmd2 = "php bing_launchpad.php";
my $cmd3 = "php bing_sourceforge.php";
my $cmd4 = "php yahoo_github.php";
my $cmd5 = "php yahoo_launchpad.php";
my $cmd6 = "php yahoo_sourceforge.php";


#Main Code
menu();
print "\n\n\n\n";

#Start all threads
$thr1 = threads->new(\&executa($cmd1)); 
#Starts $thread 1
print "Thread 1 Started!\n Command: $cmd1 \n\n";

$thr2 = threads->new(\&executa($cmd2)); 
#Starts $thread 2
print "Thread 2 Started!\n Command: $cmd2 \n\n";

$thr3 = threads->new(\&executa($cmd3)); 
#Starts $thread 3
print "Thread 3 Started!\n Command: $cmd3 \n\n";

$thr4 = threads->new(\&executa($cmd4));
#Starts $thread 4
print "Thread 4 Started!\n Command: $cmd4 \n\n";

$thr5 = threads->new(\&executa($cmd5));
#Starts $thread 5
print "Thread 5 Started!\n Command: $cmd5 \n\n";

$thr6 = threads->new(\&executa($cmd6));
#Starts $thread 6
print "Thread 6 Started!\n Command: $cmd6 \n\n";

print "\n\nExiting...! \n\n Goodbye! \n\n";

#Functions

#Call - execute a command - returns error code (0 = Fine process execution)

sub executa : parallel
{	
	#saves the command
	my $comm = $_[0];
	
	#write, read and error vars init
	my ($wrt, $read, $err);
	
	#starts the process	
	my $pid = open3($wrt, $read, $err, $comm);
	
	#prints the process id
	print "$pid\n\n";
	
	#Wait for process to finish
	waitpid( $pid, 0 ) or die "$!\n";

	#saves return value
	my $ret = $?;
	
	#saves and shows script output
	my $output = $wrt;
	print "$wrt";
	
	#State returned
	print "\n $ret returned - Good execution of process\n\n";

	
}

#Menu Function - Draws initial menu

sub menu : parallel{

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
	print " 	          Welcome, $who[0]\n               ";
	print "                                              \n";
	print "**********************************************\n";
	print "";
	print "";
	print "";

}