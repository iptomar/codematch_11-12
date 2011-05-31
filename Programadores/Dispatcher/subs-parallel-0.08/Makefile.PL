use strict;
use warnings;
use ExtUtils::MakeMaker;

WriteMakefile(
    NAME                => 'subs::parallel',
    AUTHOR              => 'Nilson Santos Figueiredo Júnior <nilsonsfj@cpan.org>',
    VERSION_FROM        => 'lib/subs/parallel.pm',
    ABSTRACT_FROM       => 'lib/subs/parallel.pm',
    PL_FILES            => {},
    PREREQ_PM => {
        'Test::More' => 0,
		'Test::Simple' => 0,
		'Attribute::Handlers' => 0,
		'Scalar::Util' => 0,
		'threads' => 0,
		'Exporter' => 0
    },
    dist                => { COMPRESS => 'gzip -9f', SUFFIX => 'gz', },
    clean               => { FILES => 'subs-parallel-*' },
);
