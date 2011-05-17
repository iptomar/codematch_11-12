<?php
//lista todos os projectos na base de bados
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

	
	function get_listProject(){
	
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');

	$rows = $column_family->get_range($key_start='', $key_finish='zzzz',100000);


	foreach($rows as $key => $columns) {
	
		return ($columns);
	
	}
	
	}
?>