<?php
//this function count the number of projects per repository
//input: repository <string>
//output: null (string) if dont find project
//        data if hit

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

function total($repo){
$no = "null";
try{
$conn = new Connection('DBCola');
//select repository database
$column_repo = new ColumnFamily($conn,'repos');
//converts the first letter to uppercase
$aux= ucfirst($repo);

////count the number of projects per repository
$pesquisa = $column_repo ->get_count($aux);
return $pesquisa;
}	
	catch(Exception $x){
	return $no;
	}
}
?>