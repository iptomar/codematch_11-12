#!/usr/bin/perl

#criado por David Semiao

#listagem de todos os processos activos

#variaveis

$list = "0";

$list = system("ps -e");

print "\n";
print "######Separador######";
print "\n";

print $list;
