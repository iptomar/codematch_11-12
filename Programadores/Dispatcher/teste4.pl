#!/bin/usr/perl

#Feito por David Semiao

#Teste arrays com perl

#Variables

@arr_mix = ('UM',1,'DOIS',2);


#Codigo

for($i = 0; $i < 4; $i++){
	
	&print_list($arr_mix[$i]);

}


#Sub_rotinas

sub print_list{

  print "@_\n";

}
