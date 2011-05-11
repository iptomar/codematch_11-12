<?php

//Faz um milhão de gets de alguns campos do projecto toto

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('tolmai');

$column_family = new ColumnFamily($conn, 'tm');

	for($num=0;$num < 1000000; $num++){
	print_r("<br>");
	$result = $column_family->get('toto', $columns=array('tm_author', 'tm_fullname', 'tm_language_P', 'tm_date_c', 'tm_source'));


	print_r($result);
	}


	
?>
