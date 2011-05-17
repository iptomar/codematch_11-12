<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

function get_details($hits){
$conn = new Connection('tolmai');

$column_family= new ColumnFamily($conn,'tm');

$rows = $column_family->get_range($key_start='', $key_finish='',$hits);
$arr_lang = array();

foreach($rows as $key => $columns) {
    
   $arr_lang[$key] = $columns;
}
return($arr_lang);
}

?>