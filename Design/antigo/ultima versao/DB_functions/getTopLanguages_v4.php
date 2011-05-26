<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

function get_top_source($rep){
$conn = new Connection('tolmai');

$column_family= new ColumnFamily($conn,'tm');
//$rep = "Github";
//Languages array
$arr= array( 1 => "ActionScript", 2 => "ADA" ,3 => "asp" , 4 =>"AspectJ"  ,5 => "Assembly", 6 => "autoIt",7 => "awk", 8 => "bash", +
			9 => "Batch" , 10 => "C",11 => "C++",12 => "C#",13 => "Caml", 14 => "CMakeFile" , 15 => "CUDA",16 => "CSS", 17 => "COBOL", +
			18=>"D",19=>"DIFF",20=>"Dos Style",21=> "Dos Style",22=> "Fortran",23=> "Fortran",24=> "Haskell",25=> "HTML",26=>"Ini file",27=>"InnoSetup", +
			28=> "JAVA",29=> "JAVASCRIPT",30=> "JSP",31=> "KiXtart",32=> "LISP",33=> "Lua",34=>"Makefile",35=>"Matlab",36=>"NSIS", +
			37=>"Objective-C",38=> "Pascal",39=> "Perl",40=>"PHP",41=> "Portugol",42=> "Postscript",43=> "PowerShell",44=> "PYTHON", +
			45=>"R",46=> "RC",47=> "Ruby" ,48=> "Scheme",49=> "Smaltalk" ,50=>"SQL" ,50=> "TCL" ,51=>"TeX",52=> "VB/VBS",53=> "Verilog",54=> "VHDL",55=> "XML" );

						//converte
$converted_array = array_map("strtoupper", $arr);
//lang counter array
$arr_lang = array();
//limit
$counter = count($arr);
$index_Git = CassandraUtil::create_index_expression('tm_repository',$rep);
//------------------- Search language ----------------
for ($i = 1; $i <= $counter; $i++ ){

//--Lang_P search --
$index_exp = CassandraUtil::create_index_expression('tm_language_P',$arr[$i]);
$index_clause = CassandraUtil::create_index_clause(array($index_exp,$index_Git));
$rows = $column_family->get_indexed_slices($index_clause);
// returns an Iterator over;

//language Counter
$count =0;
foreach($rows as $key => $columns) {
    //count matches
	$count++;
   
}

//--Lang_S search --
$index_exp = CassandraUtil::create_index_expression('tm_language_S',$arr[$i]);
$index_clause = CassandraUtil::create_index_clause(array($index_exp,$index_Git));
$rows = $column_family->get_indexed_slices($index_clause);
// returns an Iterator over;

foreach($rows as $key => $columns) {
    //count matches
	$count++;
   
}

//--Lang_T search --
$index_exp = CassandraUtil::create_index_expression('tm_language_T',$arr[$i]);
$index_clause = CassandraUtil::create_index_clause(array($index_exp,$index_Git));
$rows = $column_family->get_indexed_slices($index_clause);
// returns an Iterator over;


foreach($rows as $key => $columns) {
    //count matches
	$count++;
   
}
//--------------- End Search language ----------------
//assume key - language
$lang = $arr[$i];
//add to lang counter array
$arr_lang[$lang] = $count;

}


//sort array
arsort($arr_lang);

return ($arr_lang);
}

?>
