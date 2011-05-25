#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso

#Libraries
use IPC::Open3;
use threads;
use threads::shared;

#Variables

<<<<<<< HEAD
=======
open(LOG1,">/home/semiao/public_html/");

#Main Code
menu();
print "\n\n";

>>>>>>> origin/master
#commands to use
my $cmd1 = "php bing_github.php";
my $cmd2 = "php bing_launchpad.php";
my $cmd3 = "php bing_sourceforge.php";
my $cmd4 = "php yahoo_github.php";
my $cmd5 = "php yahoo_launchpad.php";
my $cmd6 = "php yahoo_sourceforge.php";

<<<<<<< HEAD
#Main Code
menu();
print "\n\n";
=======
>>>>>>> origin/master

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

@ReturnData = $thr1->join; 
@ReturnData = $thr2->join;
@ReturnData = $thr3->join;
@ReturnData = $thr4->join;
@ReturnData = $thr5->join;
@ReturnData = $thr6->join;

#Functions

#Call - execute a command - returns error code (0 = Fine process execution)

sub executa
{	
	#saves the command
	my $comm = $_[0];
	
	#write, read and error vars init
	my ($wrt, $read, $err);
	
	#time stamp number 1 - start process
	($seconds,$minutes,$hours,$mday,$month,$year,$wday,$yday,$isdist)=gmtime(time);
	
	#starts the process	
	my $pid = open3($wrt, $read, $err, $comm);
	
<<<<<<< HEAD
	#prints the process id and start time
	print "\n Process number $pid start time: $hours : $minutes : $seconds \n";
=======
	#prints the process id
	print "$comm PID: $pid\n";
>>>>>>> origin/master
	
	#Wait for process to finish
	waitpid( $pid, 0 ) or die "$!\n";

	#saves return value
	my $ret = $?;
	
<<<<<<< HEAD
	#time stamp number 2 - end process
	
	($seconds2,$minutes2,$hours2,$mday2,$month2,$year2,$wday2,$yday2,$isdist2)=gmtime(time);
	
	#prints the process id and end time
=======
	#save termination time in log file
		
	#saves and shows script output
	my $output = $wrt;
	print "$comm WRT: $wrt\n";
>>>>>>> origin/master
	
	print "\n Process number $pid start time: $hours2 : $minutes2 : $seconds2 \n";	
	
<<<<<<< HEAD
	#duration time calculation
	
	my $timedur = ($seconds2-$seconds)+60*($minutes2-$minutes)+3600*($hours2-$hours);
	
	#print in screen process duration time
	print "Process $pid time duration: $timedur";

	#open log file
	
	open(LOGS,">Logs/logs.dat") || die "Log file yahoo.dat could not be open!";
	
	#write in log file
	
	print LOGS "$comm ---- Duration time: $timedur \n";
	
	#close log file
	
	close(LOGS);

	
	#my $output = $wrt;
	print "$wrt";
	
	#State returned information
	if($ret==0){
	print "\n $ret returned - Good execution of process!\n";
	}
	else {
	print "\n $ret returned - Error ocurred!\n";
=======
	if($ret == 0){
		print "$ret returned - Good execution of process $comm\n";
>>>>>>> origin/master
	}
}

#Menu Function - Draws initial menu

sub menu 
{

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
	print "             Welcome, $who[0]\n               ";
	print "                                              \n";
	print "**********************************************\n";
	print "";

}
