#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso

#Libraries
use IPC::Open3;
use threads;
use threads::shared;


#Variables

my $logn = 0;

#open(LOG1,">/home/semiao/public_html/");

#Main Code
menu();
print "\n\n";


#open directory
opendir(DIR, 'd:\Escola\PSI\codematch\Programadores\Dispatcher') or die ("Unable to open directory");
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
		my $cmd = "php $file";
		#push new thread into threads array and execute comand
		push (@threads, threads->new(sub{executa($cmd,$logn)}));
		#extract number of threads
    my $thr = @threads;
		print "Thread $thr Started!\n Command: $cmd \n";
	$logn = $logn + 1;
	}
}

constrlog();


#END OF MAIN CODE

#Functions

#Call - execute a command - returns error code (0 = Fine process execution)

sub constrlog{

	



}

sub executa 
{	

	
	#time stamp number 1 - start process
	($seconds,$minutes,$hours,$mday,$month,$year,$wday,$yday,$isdist)=gmtime(time);
	$times = $hours*3600+$minutes*60+$seconds;
	
	#saves the command
	my $comm = $_[0];
	
	#saves the ordenation of the thread
	my $logf = $_[1];
	
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
	
	#time stamp number 2 - end process
	($seconds2,$minutes2,$hours2,$mday2,$month2,$year2,$wday2,$yday2,$isdist2)=gmtime(time);
	$timef = $hours2*3600+$minutes2*60+$seconds2;
	
	#duration time calculation - in seconds
	my $timedur = $timef - $times;
	
	#save termination time and other information in log file
	my $subc = substr($comm,4,4);
	
	#log construction	
	if($subc eq 'bing'){
	
		open(LOG1,">>/home/semiao/public_html/Scripts/Logs/Temp1/log$logf.dat");
		print LOG1 '$logf/$pid/$ret/$timedur';
		close(LOG1);
	} else{
		
		$subc = 'yahoo';
		open(LOG1,">>/home/semiao/public_html/Scripts/Logs/Temp1/log$logf.dat");
		print LOG1 '$logf/$pid/$ret/$timedur';
		close(LOG1);
	}
		
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
