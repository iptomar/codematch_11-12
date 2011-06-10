<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');


function insert_log($name,$lang,$total){

	try{
		//make connection with database
		$conn = new Connection('DBCola');

		//select column family
		$column_family= new ColumnFamily($conn , 'logs_lang');
		
		//single insert
		$column_family-> insert($name,array("lang" => $lang));
		//single insert
			$column_family-> insert($name,array("total" =>$total)); 		
	}
	catch(Exception $x){
		error_log($x);
	}
}
?>