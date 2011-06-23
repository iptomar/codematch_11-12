<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

//this function search the database for matching projects given a partial string of it
//input: project <string> minimum 2 letters
//output: null (string) if dont find project
//        data if hit

function search_part_proj($proj){
$proj = strtolower($proj);
$no = "null";

$conn = new Connection('DBCola');

//select repository database
$column_repo = new ColumnFamily($conn,'projects');

try{
//search repository database
$pesquisa = $column_repo ->get_range("","",10000);

//auxiliary vars
 $pos=0;
 $result = array();
 $check= array();
 
 //search all author for a match of a given author
foreach ($pesquisa as $key => $value) {
	  $check = strpos($key, $proj);
	  if ($check === false){}
		else{
			$result[$pos]=$key;
			$pos++;
		}
	   
}
	    
//return author of a given project
print_r($result);
}catch (Exception $x){
	print_r($no);
	}
}
search_part_proj("otcoco");

?>