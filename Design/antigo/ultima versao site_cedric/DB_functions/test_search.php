<?php

try{
	require_once('phpcassa/connection.php');
	require_once('phpcassa/columnfamily.php');
	
	
	
	
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');

	
	print_r("Alguns dados de um projecto:<br>");
	$result = $column_family->get('mahara', $columns=array('tm_date','tm_logo'));
	
		//$result = $column_family->get('mahara', $columns=array('tm_language'));
	
		print_r($result);
	

	print_r("<br><br>Dados de um só projecto:<br>");
	$result=$column_family->get('mahara');
	print_r($result);
	
	
	print_r("<br><br>Dados dos projectos deja-dup a elisa:<br>");
	
	$rows = $column_family->get_range($key_start='deja-dup', $key_finish='elisa');

	foreach($rows as $key => $columns) {
		
		print_r("<br>");
		Print_r($columns );
		print_r("<br>");
	}	
	
	}catch (Exception $x){
	$status = "Fail to retrieve data" ;
	print_r ($status);
}
	
?>

