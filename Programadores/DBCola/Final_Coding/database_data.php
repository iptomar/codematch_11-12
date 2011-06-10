<?php
//Author=>project
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

function get_details($hits){
$no = "null";
try{
$conn = new Connection('DBCola');

//selects autor database
$column_family= new ColumnFamily($conn,'author');
//Selects hits languages
$rows = $column_family->get_range($key_start='', $key_finish='',$hits);
$arr_lang = array();

foreach($rows as $key => $columns) {
foreach($columns as $key1 => $columns1) {
 $arr_lang[$columns1] = $key;
}
}

return($arr_lang);
}
catch(Exception $x){

		return($no);
	}	
	}
?>