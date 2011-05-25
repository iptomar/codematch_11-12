#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso

#Libraries
use IPC::Open3;
use threads;
use threads::shared;

#Variables

my $logn = 0;

#commands to use
my $cmd1 = "php bing_github.php";
my $cmd2 = "php bing_launchpad.php";
my $cmd3 = "php bing_sourceforge.php";
my $cmd4 = "php yahoo_github.php";
my $cmd5 = "php yahoo_launchpad.php";
my $cmd6 = "php yahoo_sourceforge.php";

#Main Code
menu();
print "\n\n";

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
	
	#prints the process id and start time
	print "\n Process number $pid start time: $hours : $minutes : $seconds \n";
	
	#starts the process	
	my $pid = open3($wrt, $read, $err, $comm);
	
	#Wait for process to finish
	waitpid( $pid, 0 ) or die "$!\n";

	#saves return value
	my $ret = $?;
	
	#time stamp number 2 - end process
	
	($seconds2,$minutes2,$hours2,$mday2,$month2,$year2,$wday2,$yday2,$isdist2)=gmtime(time);
	
	#prints the process id and end time
	
	print "\n Process number $pid start time: $hours2 : $minutes2 : $seconds2 \n";	
	
	#duration time calculation
	
	my $timedur = ($seconds2-$seconds)+60*($minutes2-$minutes)+3600*($hours2-$hours);
	
	#print in screen process duration time
	print "Process $pid time duration: $timedur\n";
	
		#open log file
	
	if($logn==0){
	
	open(LOGS,"log1.dat") || die "Log file yahoo.dat could not be open!";
	$logn = $logn +1;
	}
	if($logn==1){
	
	open(LOGS,"log2.dat") || die "Log file yahoo.dat could not be open!";
	$logn = $logn +1;
	}

	if($logn==2){
	
	open(LOGS,"log3.dat") || die "Log file yahoo.dat could not be open!";
	$logn = $logn +1;
	}

	if($logn==3){
	
	open(LOGS,"log4.dat") || die "Log file yahoo.dat could not be open!";
	$logn = $logn +1;
	}

	if($logn==4){
	
	open(LOGS,"log5.dat") || die "Log file yahoo.dat could not be open!";
	$logn = $logn +1;
	}
	
	if($logn==5){
	
	open(LOGS,"log6.dat") || die "Log file yahoo.dat could not be open!";
	$logn = $logn +1;
	}
	
	
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
