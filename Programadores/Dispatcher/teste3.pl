#!/bin/usr/perl

#Teste arrays com perl

#Variables

@arr_str = ('Um','Dois','Tres');
@arr_num = (1,2,3);
@arr_mix = ('UM',1,'DOIS',2,'TRES',3);
@arr_empty = ();

#Codigo

push(@arr_str,"Quatro");

push(@arr_num,4);

push(@arr_mix,"QUATRO");
push(@arr_mix,4);

unshift(@arr_empty,1);
unshift(@arr_empty,2);
unshift(@arr_empty,3);
unshift(@arr_empty,4);

for($i=0; $i < 4; $i++)
	{

	 print $arr_str[$i],"\n";

	}

print "\nSEPARADOR 1\n\n";

for($i=0; $i < 4; $i++)
	{

	 print $arr_num[$i],"\n";

	}

print "\nSEPARADOR 2\n\n";

for($i=0; $i < 8; $i++)
	{
 
	 if($i % 2 == 0){
	 	print $arr_mix[$i]," --- ";
	      }
	 else {
		print $arr_mix[$i],"\n";
	       }
	
	}
print "\n\n";