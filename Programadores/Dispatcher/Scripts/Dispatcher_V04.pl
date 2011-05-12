#!/usr/bin/perl

#Made by: David Semião & Joao Cardoso


#Libraries
use IPC::Open3;
use threads;
use threads::shared;

#Variables

my $cmd1 = "system('php bing_github.php')";
my $cmd2 = "system('php bing_launchpad.php')";
my $cmd3 = "system('php bing_sourceforge.php')";
my $cmd4 = "system('php yahoo_github.php')";
my $cmd5 = "system('php yahoo_launchpad.php')";
my $cmd6 = "system('php yahoo_sourceforge.php')";



#Main Code

menu();
print "\n\n\n\n";

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

para();

#Functions

#Call - execute a command

sub executa
{	

	my $comm = $_[0];
	
	my ($wrt, $read, $err);
	
	my $pid = open3($wrt, $read, $err, $comm);
	
	print "$pid\n\n";
	
	#Wait for process
	
	waitpid( $pid, 0 ) or die "$!\n";

	my $ret = $?;
	
	#State return
	
	if($ret == 0){
		print "\n $ret returned - Good execution of process\n\n";
	}
	
	if($ret == 1){
		print "\n $ret returned - Bad execution of process\n\n";	
	}
	return;
}

#Menu Function

sub menu{




open FH, "whoami|" or die "Failed";

my @who = qx{"whoami" 2>&1};


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

#Wait for RETURN Fuction

sub para
{
	print("\n\nPrima uma tecla para continuar...\n");
	chomp ($tmp = <STDIN>);
}