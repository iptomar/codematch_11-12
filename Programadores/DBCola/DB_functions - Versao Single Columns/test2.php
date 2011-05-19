<?php

require ("get_topLanguages_v4.php");

$lista = get_top("Github");
print_r($lista);
//require_once('phpcassa/connection.php');
//require_once('phpcassa/columnfamily.php');


//$conn = new Connection('tolmai');

//$column_family= new ColumnFamily($conn,'tm');
//$arr = array (1 =>"aaaa" , 2 =>"aaaa", 3=>"cccc");
//$converted_array = array_map("strtoupper", $arr);
//print_r($converted_array);
//$resultado = get_top();
//print_r($resultado);

//$rows = $column_family->get_range($key_start='', $key_finish='',100000);
// returns an Iterator over:
// array('row_key5' => array('name' => 'val'),
//       'row_key6' => array('name' => 'val'),
//       'row_key7' => array('name' => 'val'))
//$count=0;
//foreach($rows as $key => $columns) {
    // Do stuff with $key or $columns
	//$count++;
  //  Print_r($columns);
//}
//Print($count);

?>