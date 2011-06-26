<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

$conn = new Connection('DBCola');

//select databases
$column_hello= new ColumnFamily($conn,'helloworld');
$lang='C#';
$helloo='<%@ Page Language="C#" %><br>
<% Response.write("Hello World!"); %>';


$lang= array( 1 =>'Asp(C#)',2=>'BATCH',3=>'C',4=>'ActionScript',5=>'ADA',6=>'AspectJ',7=>'Assembly',8=>'autoIt',9=>'awk',10=>'bash',11=>'C++',12=>'C#',13=>'Caml',
14=>'CUDA',15=>'CSS',16=>'COBOL',17=>'D',18=>'DIFF',19=>'Erlang',20=>'Fortran',21=>'Groovy',22=>'Haskell',23=>'HTML',24=>'InnoSetup',25=>'Java'
,26=>'JavaScript',27=>'JSP',28=>'KiXtart',29=>'LISP',30=>'Lua',31=>'Matlab',32=>'NSIS',33=>'Objective-C',34=>'Pascal',35=>'Perl',36=>'Php',37=>'Portugol'
,38=>'Postscript',39=>'PowerShell',40=>'Python',41=>'R',42=>'RC',43=>'Ruby',44=>'Scheme',45=>'Smaltalk',46=>'SQL',47=>'TCL',48=>'LaTeX'
,49=>'VB/VBS',50=>'Verilog',51=>'VHDL',52=>'XML',53=>'YAML');

$converted_array = array_map("strtoupper", $lang);
$helloo= array( 1 =>'<%@ Page Language="C#" %><br><% Response.write("Hello World!");%>',2=>'@echo Hello World!',3=>'#include <stdio.h><br>main()<br>{<br>printf ("Hello World!\n");<br>}',4=>'trace ("Hello World!")',5=>'with Ada.Text_IO; <br>
procedure helloWorld is<br>
begin<br>
  Ada.Text_IO.Put_Line("Hello World!"); <br>
  Ada.Text_IO.New_Line; <br>
end helloWorld; 
',6=>'public aspect HelloFromAspectJ {<br>
pointcut mainMethod() : execution(public static void main(String[]));<br>
after() returning : mainMethod() {<br>
System.out.println("Hello World!"); <br>
}<br>
 }<br>
',7=>'variable: <br>
   .message   db   "Hello World!$" <br>
code: <br>
   mov  ah, 9<br>
   mov  dx, offset .message<br>
   int  0x21<br>
   ret<br>
',8=>'MsgBox(0, "Tutorial", "Hello World!") <br>',9=>'BEGIN { print "Hello World!" }<br>',10=>'#!/bin/bash <br>
echo Hello World! <br>
',11=>'#include <iostream><br>
 using namespace std; <br>
 int main()<br>
{<br>
   cout << "Hello World!" << endl; <br>
   return 0; <br>
}<br>
',12=>'using System; <br>
namespace HelloWordApplication<br>
{<br>
   class HelloWorldApp<br>
   {<br>
      public static void Main()<br>
      {<br>
         Console.WriteLine("Hello World!"); <br>
      }<br>
   }<br>
}<br>
',13=>'print_string "Hello world!\n";<br>',14=>"#include <cuda.h><br>
#include <stdio.h><br>
__global__ void helloWorld(char*);<br>
// Host function<br>
int<br>
main(int argc, char** argv) <br>
{<br>
  int i; <br>
  // desired output<br>
  char str[] = 'Hello World!'; <br>
  // mangle contents of output<br>
  // the null character is left intact for simplicity<br>
  for(i = 0; i < 12; i++)<br>
    str[i] -= i; <br>
  // allocate memory on the device<br> 
  char *d_str; <br>
  size_t size = sizeof(str); <br>
  cudaMalloc((void**)&d_str, size); <br>
  // copy the string to the device<br>
  cudaMemcpy(d_str, str, size, cudaMemcpyHostToDevice); <br>
  // set the grid and block sizes<br>
  dim3 dimGrid(2);   // one block per word<br>  
  dim3 dimBlock(6); // one thread per character<br>
  // invoke the kernel<br>
  helloWorld<<< dimGrid, dimBlock >>>(d_str); <br>
  // retrieve the results from the device<br>
  cudaMemcpy(str, d_str, size, cudaMemcpyDeviceToHost); <br>
  // free up the allocated memory on the device<br>
  cudaFree(d_str); <br>
  // everyone's favorite part<br>
  printf('%s\n', str); <br>
  return 0; <br>
}<br>
// Device kernel<br>
__global__ void<br>
helloWorld(char* str) <br>
{<br>
  // determine where in the thread grid we are<br>
  int idx = blockIdx.x * blockDim.x + threadIdx.x; <br>
  // unmangle output<br>
  str[idx] += idx; <br>
}<br>
",15=>'<html><br>
<head><br>
<style type="text/css"><br>
#id1 {<br>
   font-size : 2em; <br>
   color : red; <br>
}<br>
.class1 { color : blue; }<br>
</style><br>
</head><br>
<body><br>
 <div class="class1"><span id="id1"></span><br>
Hello World! <br>
</div><br>
</body><br>
</html><br>
',16=>'IDENTIFICATION DIVISION. <br>
PROGRAM-ID.     HELLO-WORLD. <br>
ENVIRONMENT DIVISION. <br>
DATA DIVISION. <br>
PROCEDURE DIVISION<br>.
DISPLAY "Hello World!". <br>
STOP RUN. <br>
',17=>'import std.c.stdio<br>;
 void main()<br>
{<br>
   printf("Hello World!\n");<br>
}<br>
',18=>"echo 'Hello World!'<br>",19=>'module(hello). <br>
export([hello_world/0]). <br>
hello_world() -> io:fwrite("hello, world\n").<br>
',20=>"HELLO<br>
WRITE(*,10) <br>
10 FORMAT('Hello World!') <br>
STOP<br>
END<br>
",21=>'println "hello, world"<br>
for (arg in this.args ) {<br>
  println "Argument:" + arg; <br>
}<br>
/* a block comment, commenting out an alternative to above: <br>
this.args.each{ arg -> println "hello, ${arg}"}<br>
*/<br>
',22=>'main = putStrLn "Hello World!" <br>',23=>'<HTML><br>
<!-- Hello World in HTML --><br>
<HEAD><br>
<TITLE>Hello World!</TITLE><br>
</HEAD><br>
<BODY><br>
Hello World! <br>
</BODY><br>
</HTML><br>
',24=>'echo Hello World! <br>',25=>'public class Hello {<br>
    public static void main(String[] args) {<br>
        System.out.println("Hello World!"); <br>
    }<br>
}<br>
',26=>'document.write("Hello World!"); <br>',27=>'<html><br>
	<head><title>Hello World JSP Page.</title></head><br>
	<body><br>
		<font size="10"><%="Hello World!" %></font><br>
	</body><br>
</html><br>
',28=>'Kix code here<br>
"Hello World!" <br>
',29=>"(print 'Hello World!') <br>",30=>"print'Hello World!' <br>",31=>"<<hello_world.m>>=fprintf('Hello world!\n'); <br>",32=>"outfile 'hello world.exe'<br>
section<br>
messageBox MB_OK 'Hello World!' <br>
sectionEnd<br>
",33=>"#import <stdio.h><br>
int main( int argc, const char *argv[] ) {<br>
    printf( 'hello world\n' ); <br>
    return 0; <br>
}<br>
",34=>"program OlaMundo(output); <br>
begin<br>
  WriteLn('Hello World!'); <br>
end. <br>
",35=>"print 'Hello World!'; <br>",36=>'<?php<br>
   echo  Hello World!"; <br>
?> <br>
',37=>"algoritmo OlaMundo<br>
inicio<br>
   escreva('Hello World!') <br>
fim<br>
",38=>'<<HelloWorld.ps>>=<br>
%!PS<br>
% set up font: <br>
/mainfont /Helvetica findfont 32 scalefont def mainfont setfont<br>
% Move point to specific location<br>
225 450 moveto<br>
% Print text on page<br>
(Hello  World!) show<br>
% Show results by printing or other method showpage<br>
',39=>"strString = 'Hello World!' <br>
write-host strString<br>
",40=>"print('Hello World!') <br>",41=>"at('Hello World!\n')<br>",42=>"StringWriter writer = new StringWriter();<br>
Sequence wf = new Sequence<br>
            {<br>
           Activities = {<br>
       new WriteLine {Text = 'Hello', TextWriter = writer},<br>
       new WriteLine {Text = 'World', TextWriter = writer}<br>
                    }<br>
      };<br>
 WorkflowInvoker.Invoke(wf); <br>
",43=>"def show_me<br>
    puts 'Hello World'<br>
  end<br>",
44=>"(display 'Hello World!') <br>
(newline) <br>
",45=>"Transcript show: 'Hello World!'. <br>",46=>"SELECT 'Hello World!' <br>",47=>"puts 'Hello World!' <br>",48=>'\documentclass[12pt]{article}<br>
\begin{document}<br>
Hello World! <br>
$Hello world!$ %math mode<br> 
\end{document}<br>
',49=>"Private Sub Form_Load()<br>
    Print 'Hello World!' <br>
End Sub<br>
",50=>"module hello_world ; <br>
initial begin<br>
   display ('Hello World!'); <br>
    #10  finish; <br>
end<br>
endmodule <br>
",51=>"entity hello_world is<br>
end; <br>
architecture hello_world of hello_world is<br>
begin<br>
  stimulus : process<br>
  begin<br>
    assert false report 'Hello World!' <br>
    severity note; <br>
    wait; <br>
  end process stimulus; <br>
end hello_world; <br>
",52=>"<?xml version='1.0' encoding='UTF-8'?><br>
<text><br>
  <para> Hello World!</para><br>
</text><br>
",53=>"print 'Hello World!' <br>");


$counter = count($lang);
for ($i = 1; $i <= $counter; $i++ ){

$column_hello-> insert($converted_array[$i],array("code" => $helloo[$i]));
//$column_hello->remove($lang[$i]);
}
$aux=$column_hello->get('RUBY');
print_r($aux);
//print_r($helloo);
?>