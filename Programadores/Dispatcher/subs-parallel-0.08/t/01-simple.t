#!./perl -w

use lib qw(t/lib);

# Due to a bug in older versions of MakeMaker & Test::Harness, we must
# ensure the blib's are in @INC
use lib qw(blib/lib blib/arch ../lib);

use strict;
use warnings;
use Test::Simple tests => 5;

use subs::parallel;

my $test10 = test10();
my $test20 = test20();
ok($test10 == 10 && $test20 == 20);

my $test30 = test10() + test20();
ok($test30 == 30);

my $test200 = testmul($test10, $test20);
ok($test200 = 200);

my @test = (2,4,6,8,10);
my $testarray = testarray(@test);
my $bool = 1;
for (my $i = 0; $i <= $#test; $i++) {
	if ($test[$i] != $testarray->[$i]-1) {
		$bool = 0;
		last;
	}
}
ok($bool);

eval('use IO::Handle');
if ($@) { ok(1, 'skipped') }
else {
	my $io = parallelize { new IO::Handle };
	ok("$io" && ref($io) eq 'IO::Handle');
}

sub test10 : Parallel {	return 10 }
sub test20 : Parallel { return 20 }
sub testmul : Parallel { return $_[0] * $_[1] }
sub testarray : Parallel { 
	my @array = @_;
	for (@array) { $_++ }
	return [@array];
}