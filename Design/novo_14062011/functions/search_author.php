<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all projects from a given author
//input: author <string>
//output: null (string) if dont find project
//        data if hit

function search_author($authr){
$authr = strtolower($authr);
$no = "null";

$conn = new Connection('DBCola');

try{
//selects author database
$column_authr = new ColumnFamily($conn,'author');

//search author database
$pesquisa = $column_authr ->get($authr);

//auxiliary var
 $in=0;
 $res = array();
 
foreach ($pesquisa as $key => $value) {
		$res[$in] = $value;	
		$in++;
		
}

//return results
return $pesquisa;
}catch (Exception $x){
	return $no;
	}
}

?>