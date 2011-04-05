#!/usr/bin/perl

#Criar threads e utilizar subrotinas

    use threads;

    $thr = threads->new(\&sub1);

    sub sub1 {
        print "In the thread\n";
    }
