<?php

//This function retrieves data on DB

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//without arguments returns evry column in the row - default number 100
/*
$result =$column_family->get('pumpcontrol');
//return results
print_r ($result);
print_r("<br>");
*/

for($i=0;$i<1000000;$i++){

$rows = $column_family->get_range($key_start='yourtube', $key_finish='pumpcontrol');

	foreach($rows as $key => $columns) {

		print_r("<br>");
		Print_r($columns );
		print_r("<br>");
	}

}

?>
