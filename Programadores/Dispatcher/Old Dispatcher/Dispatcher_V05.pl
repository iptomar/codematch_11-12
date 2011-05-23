#! /usr/bin/perl

use subs::parallel;


#Variables



#Main Code


my $thr1 = thread1();

my $thr2 = thread2();

my $thr3 = thread3();


#Functions

sub thread1 : Parallel{

print "This is THREAD 1";


}

sub thread2 : Parallel{

print "This is THREAD 2";


}

sub thread3 : Parallel{

print "This is THREAD 3";


}