#!/usr/bin/perl

#Dados partilhados em threads

    use threads;
    use threads::shared;

    my $foo : shared = 1;
    my $bar = 1;
    threads->new(sub { $foo++; $bar++ })->join;

    print "$foo\n";  #prints 2 since $foo is shared
    print "$bar\n";  #prints 1 since $bar is not shared
