<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');


//this function search and get all projects from a given repository
//input: repository <string>
//output: null (string) if dont find project
//        data if hit

function search_repo($repo){
$repo = ucfirst($repo);
$no = "null";

$conn = new Connection('DBCola');
try{
//select repository database
$column_repo = new ColumnFamily($conn,'repos');

//search repository database
$pesquisa = $column_repo ->get($repo);

//return results
print_r($pesquisa);
}catch (Exception $x){
	print_r($no);
	}
}
search_repo("Github");
?>