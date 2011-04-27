#!/usr/bin/perl -s

#Made by: David Semião


#Libraries
use IPC::Open3;
use threads;
use threads::shared;

#Control condition for argument $input
if (!$input){
	print STDERR "Erro: argumento inválido.\n\n Utilização: Dispatcher_V04.pl -input=<nome do ficheiro> \n\n";
	exit (1);
}


#Variables

my $cmd = "perl ".$input." ";

my $ctrl1 = 0;
my $ctrl2 = 0;
my $ctrl3 = 0;


#Main Code


print "$input\n";
print "$cmd";

$thr1 = threads->new(\&executa($cmd)); 
#Starts $thread 1

$thr2 = threads->new(\&executa($cmd)); 
#Starts $thread 2

$thr3 = threads->new(\&executa($cmd)); 
#Starts $thread 3

# while($ctrl1 != 1 && $ctrl2 != 1 && $ctrl3 != 1){
	
			
		
		# if($thr1->is_joinable()){	#tests $thr1
		
			
			# system('echo "Thread 1 terminada" | more');
			# $ctrl1 = 1;
		
		# } else {	system('echo "Thread 1 em execucao!!!" | wall');}
		
		# if($thr2->is_joinable()){	#tests thr2
		
			
			# system('echo "Thread 2 terminada" | more');
			# $ctrl2 = 1;
			
		
		# } else {	system('echo "Thread 2 em execucao!!!" | wall');}
		
		# if($thr3->is_joinable()){	#tests thr3
		
			
			# system('echo "Thread 3 terminada" | more');
			# $ctrl3 = 1;
		
		# } else {	system('echo "Thread 3 em execucao!!!" | wall');}
	
		
	# }

print "\n\nExiting...! \n Goodbye! \n";

para();

#Functions

#Call - execute a command

sub executa
{	



	my $comm = $_[0];
	
	my ($wrt, $read, $err);
	
	print "\n$comm\n\n";

	my $pid = open3($wrt, $read, $err, $comm);

	system('echo $_[0] | wall');
	
	waitpid( $pid, 0 ) or die "$!\n";

	my $ret = $?;
	
	print "\n $ret - Good execution of process\n\n";
	
	return;
}


#Wait for RETURN

sub para
{
	print("\n\nPrima uma tecla para continuar...\n");
	chomp ($tmp = <STDIN>);
}