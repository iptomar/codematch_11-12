<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all authors(from partial name)
//input: author <string> minimum 2 letters input
//output: null (string) if dont find project
//        data if hit

function search_part_author($authr){
$authr = strtolower($authr);
$no = "null";

$conn = new Connection('DBCola');

//selects author database
$column_authr = new ColumnFamily($conn,'author');

try{
//search author database
$pesquisa = $column_authr ->get_range("","",100000);

$result = array();
$pos = 0;
 foreach($pesquisa as $key => $columns) {
	$check = strpos($key, $authr);
	if ($check === false){}
		else{
			$result[$pos]=$key;
			$pos++;
		}
}


//return results
return $result;
}catch(Exception $x){
	return $no;
	}
}

?>
