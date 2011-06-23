<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');


//this function search and get all repository (from partial name)
//input: repository <string> minimum 2 letters
//output: null (string) if dont find project
//        data if hit

function search_part_repo($repo){
$repo = ucfirst($repo);
$no = "null";

$conn = new Connection('DBCola');

//select repository database
$column_repo = new ColumnFamily($conn,'repos');

try{
//search repository database
$pesquisa = $column_repo ->get_range("","",100000);

$result = array();
$pos = 0;
 foreach($pesquisa as $key => $columns) {
	$check = strpos($key, $repo);
	if ($check === false){}
		else{
			$result[$pos]=$key;
			$pos++;
		}
}


//return results
print_r($result);
}catch (Exception $x){
	print_r($no);
	}
}
search_part_repo("g");


?>