#!/usr/bin/perl

#Feito por David Semiao e João Cardoso

#Criar threads e utilizar subrotinas

    use threads;

    $thr = threads->new(\&sub1);

    sub sub1 {
        print "In the thread\n";
    }
