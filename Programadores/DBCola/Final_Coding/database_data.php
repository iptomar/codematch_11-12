<?php

require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');


function get_details($hits){
$conn = new Connection('DBCola');


$column_family= new ColumnFamily($conn,'author');

$rows = $column_family->get_range($key_start='', $key_finish='',$hits);
$arr_lang = array();

foreach($rows as $key => $columns) {
foreach($columns as $key1 => $columns1) {
 $arr_lang[$columns1] = $key;
}
}

//print_r($rows);
return($arr_lang);
}
?>