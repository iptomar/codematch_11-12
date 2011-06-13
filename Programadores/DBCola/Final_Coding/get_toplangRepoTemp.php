<?php


//top de linguagens por repositorio
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');


function toplog($proj){
$no = "null";
try{
$conn = new Connection('DBCola');

//selects autor database
$column_family= new ColumnFamily($conn,'toplang');
//Selects hits languages
$rows = $column_family->get($proj);

$arr_lang = array();
foreach($rows as $key => $columns) {
$json = json_decode($columns);
}

print_r($json);
}	
	catch(Exception $x){
		return($no);
	}
}
//

?>