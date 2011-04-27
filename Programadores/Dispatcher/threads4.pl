#!/usr/bin/perl

#Feito por David Semiao e João Cardoso

#Ignorar uma thread
    use threads;

    $thr = threads->new(\&sub1); # Spawn the thread

    $thr->detach; # Now we officially don't care any more

    sub sub1 {
        $a = 0;
        while (1) {
            $a++;
            print "\$a is $a\n";
            sleep 5;
        }
    }
