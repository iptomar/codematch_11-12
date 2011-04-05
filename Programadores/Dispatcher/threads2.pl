#!/usr/bin/perl

#utilizar threads e passar parametros para subrotinas
    use threads;

    $Param3 = "foo";
    $thr = threads->new(\&sub1, "Param 1", "Param 2", $Param3);
    $thr = threads->new(\&sub1, @ParamList);
    $thr = threads->new(\&sub1, qw(Param1 Param2 Param3));

    sub sub1 {
        my @InboundParameters = @_;
        print "In the thread\n";
        print "got parameters >", join("<>", @InboundParameters), "<\n";
    }
