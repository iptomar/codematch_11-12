<?php

//information repository
//output: null (string) if dont find project
//		  Array data

require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');
	
	function info($repo){
	$no = "null";
		try{
		//make connection with database
		$conn = new Connection('DBCola');

		//select column family
		$column_family= new ColumnFamily($conn , 'repo');
		
		//converts the first letter to uppercase
		$repo1= ucfirst($repo);
		$aux=$column_family->get($repo1);
	print_r($aux);
	
	}
	catch(Exception $x){
			print_r($no);
	}
}
info("SourceForge");
?>