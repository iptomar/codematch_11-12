#!/usr/bin/perl

#Feito por David Semiao e João Cardoso

#Aguardar que a thread termine
    use threads;

    $thr = threads->new(\&sub1);

    @ReturnData = $thr->join;
    print "Thread returned @ReturnData\n";

    sub sub1 { return "Fifty-six", "foo", 2; }
