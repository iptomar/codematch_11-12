#!/usr/bin/perl

    use threads;
    use threads::shared;

    my $total : shared = 0;

    sub calc {
        for (;;) {
            my $result;
            $result = 2354+1;
            {
                lock($total); # block until we obtain the lock
                $total += $result;
            } # lock implicitly released at end of scope
            last if $result == 0;
        }
    }

    my $thr1 = threads->new(\&calc);
    my $thr2 = threads->new(\&calc);
    my $thr3 = threads->new(\&calc);
    $thr1->join;
    $thr2->join;
    $thr3->join;
    print "total=$total\n";
