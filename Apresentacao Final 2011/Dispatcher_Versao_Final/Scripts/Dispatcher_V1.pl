#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso

#Libraries
use IPC::Open3;
use threads;
use threads::shared;


#Variables


#commands to use
my $cmd1 = "php bing_github.php";

my $cmd2 = "php bing_launchpad.php";

my $cmd3 = "php bing_sourceforge.php";

my $cmd4 = "php yahoo_github.php";

my $cmd5 = "php yahoo_launchpad.php";

my $cmd6 = "php yahoo_sourceforge.php";

my $cmd7 = "php launchpad_proj.php";

my $cmd8 = "php github_proj.php";

my $cmd9 = "php get_TopLanguagesRepo.php";


#Main Code
menu();
print "\n\n\n\n";

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

$thr7 = threads->new(sub{executa($cmd7)});
#Starts $thread 7
print "Thread 7 Started!\n Command: $cmd7 \n";

$thr8 = threads->new(sub{executa($cmd8)});
#Starts $thread 8
print "Thread 8 Started!\n Command: $cmd8 \n";

$thr9 = threads->new(sub{executa($cmd9)});
#Starts $thread 9
print "Thread 9 Started!\n Command: $cmd9 \n";

@ReturnData = $thr1->join; 
@ReturnData = $thr2->join;
@ReturnData = $thr3->join;
@ReturnData = $thr4->join;
@ReturnData = $thr5->join;
@ReturnData = $thr6->join;
@ReturnData = $thr7->join;
@ReturnData = $thr8->join;
@ReturnData = $thr9->join;


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
	print "$pid\n\n";
	
	#Wait for process to finish
	waitpid( $pid, 0 ) or die "$!\n";

	#saves return value
	my $ret = $?;
	
	#save termination time in log file
	

	#saves and shows script output
	my $output = $wrt;
	print "$wrt";
	
	#State returned
	
	if($ret == 0){
	print "$ret returned - Good execution of process\n";
	}
	
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