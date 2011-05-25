#!/usr/bin/perl

opendir(DIR, 'd:\Escola\PSI\codematch\Programadores\Dispatcher') || die ("Unable to open directory");
#this line gets rid of . and ..<br>
@files = grep !/^\./, readdir(DIR);
closedir(DIR);
    foreach $file (sort @files) {
		my $ext = ($file =~ m/([^.]+)$/)[0];
		print ("extensão: $ext \n");
	if ($ext eq "php" || $ext eq "PHP"){
		print ("Ficheiro PHP: $file \n");
	}
}
