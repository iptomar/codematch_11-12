package subs::parallel;

use warnings;
use strict;

use threads;
use vars qw/@ISA @EXPORT $AUTOLOAD/;
use Attribute::Handlers;
use Scalar::Util qw/set_prototype/;

=head1 NAME

subs::parallel - enables subroutines to seamlessly run in parallel

=head1 VERSION

Version 0.08

=cut

require Exporter;
@ISA = qw(Exporter);
@EXPORT = qw(parallelize parallelize_sub parallelize_coderef);

our $VERSION = '0.08';

use overload 
	'""'  => \&_deref,
	'0+'  => \&_deref,
	'bool'=> \&_deref,
	'${}' => \&_deref,
	'@{}' => \&_deref,
	'%{}' => \&_deref,
	'&{}' => \&_deref,
	'*{}' => \&_deref,
	fallback => 1;

=head1 SYNOPSIS

  use subs::parallel;
  
  sub foo : Parallel {
    # foo runs in parallel
  }
  
  parallelize_sub('bar'); 
  # subroutine named bar now runs in parallel
  
  my $foo = foo(); # returns immediately
  my $bar = bar(); # also returns immediately
  
  # now it might block waiting for both to finish
  if ($foo == $bar) {
    ...
  }
  
  
  my $baz = parallelize { ... code ... }; # returns immediately
  
  ...
  
  print "baz: $baz\n"; # if it's still running, blocks until it finishes
  
  
  # it can be done to anonymous subs or any other coderefs too
  my $anon = sub { ... more code ... };
  my $parallel_coderef = parallelize_coderef($anon);

  my $foobar = $parallel_coderef->('arg'); # returns immediately
  
  ...
  
  # sub should return an object, no problem
  $foobar->do_something_else(); # blocks until it finishes running

=head1 DESCRIPTION

This module gives Perl programmers the ability to easily and conveniently 
create multi-threaded applications through B<parallel subroutines>.

Parallel subroutines are just plain old subroutines which happen to run in
another thread. When called, they return immediately to the calling thread but
keep running in another. When its return value is needed somewhere, the 
returned value is transparently fetched. If the thread is still running, the
code blocks waiting for it to finish (since the program can't go on without a 
value and keep being transparent).

So, as it's possible to notice, the module interface aims to be as simple 
as possible. In fact, it works in such a way that, aside from the 
I<parallelizing> directives, you wouldn't be able to tell it's a multi-threaded 
application. All the thread handling (which isn't I<that> complicated, really) 
is done automagically.

It should work for anything that's thread safe - even for subroutines whose
return values are not usually available across thread boundaries (for example,
usually, you can't C<share> an object, but this module makes it possible to 
return them without any problems, provided they're thread safe).

=head1 MOTIVATION

The main reason behind this module was the fact that Perl threads are not 
widely used. Some could argue that this might happen because Perl threads are
not very practical to use. Others could say that the restrictions imposed by
the use of threads (you can't pass arbitrary data structures between threads).

The latter issue is out of my reach. But, through the use of already existing
features, it was possible to mask it a little bit. So you can return anything
from your parallelized subroutines, but this is just some maybe unknown feature
of C<threads->join>.

The first issue is the main aim of this module: provide an extremely simple way
to make multi-threaded applications. Along this near-future reality of a 
majority of dual-core computers, multi-threading might become the factor that
distiguishes good from bad software.

But I would be dishonest if I didn't note that some part of the effort was
driven by the will to prove it could be done in Perl.

=head1 ATTRIBUTE HANDLING

The most practical way of using this module's features is through attrubutes.
This snippet ilustrates how to do it:

  use subs::parallel;
  
  sub foobar : Parallel {
  	# do stuff
  }

That way, C<foobar> is declared as a B<parallel subroutine>. This should have 
exactly the same effect as using the C<parallelize_sub> below, but is cleaner
and more convenient.

=head1 EXPORTS

The C<parallelize>, C<parallelize_sub> and C<parallelize_coderef> subroutines
are exported. If you have problems with that, you're free to:

  use subs::parallel ();

=head1 FUNCTIONS

All the three functions available work similarly, implementing the idea of 
B<parallelized subroutines> as explained above. Nevertheless, here's a brief
explanation of each of them.

=head2 parallelize { BLOCK }

Starts running the specified block of code in parallel B<immediately>.
The snippet below ilustrates this concept:

  use subs::parallel;

  my $foo = parallelize {
    # do stuff here
  };

  my $bar = parallelize {
    # do even more stuff
  };

  # now we wait for them to finish
  print "$foo, $bar\n";

=cut

# parallelizes and runs a block of code / coderef
sub parallelize (&) { parallelize_coderef(shift)->() }

=head2 parallelize_sub(STRING)

Transforms the named subroutine into a B<parallel subroutine>. After this 
modification, every it's called, it will run inside another thread and return
immediately to the caller.

The snippet below ilustrates this concept:

  use subs::parallel;

  sub blocking_stuff {
	  # do blocking stuff
  }

  blocking_stuff(); # this blocks

  parallelize_sub('blocking_stuff');
  
  blocking_stuff();
  # now it returns immediately and the return values are discarded

Note that, you can I<parallelize> named subroutines inside other packages:

  parallelize_sub('Other::Package::function');

=cut

# parallelizing subroutines by name
sub parallelize_sub {
	my ($sub) = @_;
	
	# only prepend caller package if it's fully qualified
	# allows easy parallelizing of subroutines inside other packages
	if ($sub !~ /::/) {
		my ($caller) = caller();
		$sub = join('::', $caller, $sub);
	}

	# we don't want nasty warnings - but don't try this at home
	no strict 'refs';
	no warnings 'redefine';

	croak("can't parallelize non-existant subroutine") unless defined *{$sub}{CODE};
	
	# keeps the prototype
	*$sub = &set_prototype(parallelize_coderef(\&$sub), prototype($sub));
}

=head2 parallelize_coderef(CODEREF)

Returns a parallelized version of the given CODEREF. This function is used 
internally to implement the other two functions explained above.

  my $code = sub { ... }
  my $parallel = parallelize_coderef($code);

  my $return = $parallel->(@args); # runs in another thread

=cut

# returns a new coderef: a parallelized version of the original coderef
# the original is *not* modified
sub parallelize_coderef {
	my ($coderef) = @_;

	return sub {
		# this is the simple trick which makes this module work
		my $scalar = threads->create($coderef, @_);
		bless {thread => $scalar, caller => threads->tid}, __PACKAGE__;
	};
}

# support for parallelizing through subroutine attributes
sub UNIVERSAL::Parallel : ATTR(CODE) {
	# for completeness sake, let's have the whole prototype
	my ($caller, $symtable, $coderef, $attr, $data, $phase) = @_;

	no warnings 'redefine';
	# keeps the prototype
	*$symtable = &set_prototype(parallelize_coderef($coderef), prototype($coderef));
}

# the overload handler
sub _deref {
	my $class = CORE::ref $_[0];
	# work-around in order to support scalar refs - yes, it's kinda ugly
	# the alternative would be Acme::Damn but I feel kinda bad using Acme modules
	bless $_[0], "${class}::NoOverload";
	if (CORE::ref($_[0]->{thread}) eq 'threads') {
		$_[0] = $_[0]->{thread}->join;
	}
	else {
		# just in case - should never get here
		croak(__PACKAGE__ . " object doesn't reference a threads object - something really bad happened");
	}
	return $_[0];
}

# provide method calling support
sub AUTOLOAD {
	# make errors appear to come from the caller
	local $SIG{__DIE__} = sub { goto &croak };
	(my $sub = $AUTOLOAD) =~ s/.*:://;
	$_[0] = _deref($_[0]);
	# unfortunately, if we used goto CODEREF, the call wouldn't be made as a 
	# method and warnings wouldn't be transparent. so, we prefer messing up the
	# caller stack - which is not that used anyway, aside from instrospection
	# modules.
	shift->$sub(@_);
}

sub croak {
	# somehow, local $SIG handlers are not actually locally scoped
	# this makes sure we get other possibly fatal errors
	local $SIG{__DIE__} = '';
	(my $err = shift) =~ s/ at [^ ]+ line (?:\d+).?\n//;
	require Carp;
	Carp::croak($err);
}

# magic destructor!
# ok, ok... it just detaches the thread if we go out of scope.
# BUT ONLY IF we're the original caller of the thread
# this is a work-around for a strange behaviour of the perl threads implementation
sub DESTROY {
	my $class = CORE::ref($_[0]);
	bless $_[0], "${class}::NoOverload";
	if (CORE::ref($_[0]->{thread}) eq 'threads' && $_[0]->{caller} == threads->tid) {
		$_[0]->{thread}->detach;
	}
}

# provide overriden ref() function
sub ref ($) {
	return CORE::ref($_[0]) if CORE::ref($_[0]) ne __PACKAGE__;
	return CORE::ref($_[0]->_deref);
}
*CORE::GLOBAL::ref = \&ref;

1;

# ok, i didn't tie anything. oh well, can't use them all...

=head1 INTERACTION WITH OTHER MODULES

The only B<known> issue is between this module and L<Catalyst>. When using 
L<Catalyst> the C<Parallel> attribute seems to be broken. This is probably due
to L<Catalyst> trying to process every possible attribute, but I'm not really
sure. Patches are welcome.

There's a simple workaround. Instead of writing:

  sub foo : Parallel {
      # code here
  }

Use the slightly more verbose:

  sub foo {
      # code here
  }

  parallelize_sub('foo');

That should work in all cases.

=head1 CAVEATS

Currently, the parallel subroutines will always be called in scalar context. 
There are plans for changing this in the future but, for now, if multiple 
return values are needed, consider wrapping them around an array ref (this
feature would require adding the Want module as a dependency).

In order for objects to survice across threads, both the calling and the
executing thread must have its class properly included. This means that you
can't require a module only inside a subroutine and then return an object 
blessed into that class to the calling thread. 

You shouldn't pass to another thread/parallelized subroutines previous return
values from other parallelized subroutines without reading their values. And,
while you can get away with it, it's probably too much rope to hang yourself on
when things start to get ugly. This might be changed in the future, but would
require some sort of explicit synchronization through shared variables.

Also, there's no way to tell if a parallelized subroutine is still running or 
not. This probably will be changed in the future but, unfortunately, will 
require either a minimalistic approach using some simple shared variables or 
the use of Thread::Running, which would be another dependency and ends up using
shared variables anyway.

The caller stack may behave in a non expected manner. When calling returned 
object's methods, there will be an extra level in the stack, representing 
C<AUTOLOAD> magic - the third form of C<goto> couldn't be used since that way
if the user called a non-existant method, he wouldn't get the default warning.
In the future, maybe this will be configurable so that if you need to rely on
the caller stack, you can make this trade-off.

If the I<parallelized> subroutine dies, you won't get any warnings on notices
of any kind. It would be like it returned C<undef>. This might change in the 
future.

C<GLOBAL::CORE::ref> is overriden. This may be an issue if there are other 
modules in use which override it too. In the future, there may be a switch to
disable this.

=head1 BUGS

Besides the CAVEATS (which some people might consider to be bugs) there are no
known bugs.

Please report any bugs or feature requests to
C<bug-subs-parallel@rt.cpan.org>, or through the web interface at
L<http://rt.cpan.org/NoAuth/ReportBug.html?Queue=subs-parallel-0.08>.
I will be notified, and then you'll automatically be notified of progress on
your bug as I make changes.

=head1 AUTHOR

Nilson Santos F. Jr., C<< <nilsonsfj@cpan.org> >>

=head1 COPYRIGHT & LICENSE

Copyright (C) 2005-2007 Nilson Santos Figueiredo Júnior.

This program is free software; you can redistribute it and/or modify it
under the same terms as Perl itself.

=head1 SEE ALSO

L<threads>

=cut

1; # End of subs::parallel
