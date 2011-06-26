<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

//this function search and get all authors
//input: none
//output: array with all authors

function list_author(){

$no = "null";

$conn = new Connection('DBCola');

try{
//selects author database
$column_authr = new ColumnFamily($conn,'author');

//search author database
$pesquisa = $column_authr ->get_range("","",100000);

//auxiliary var
 $in=0;
 $res = array();
 
foreach ($pesquisa as $key => $value) {
		$res[$in] = $key;	
		$in++;
		
}
//return results
return $res;
}catch (Exception $x){
	return $no;
	}
}


?>