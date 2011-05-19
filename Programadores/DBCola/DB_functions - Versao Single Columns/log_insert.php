<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');



function insert_log($name,$nameproj, $language1, $plang1, $language2, $plang2, $language3, $plang3, $other,$pother){
   
	try{
		//make connection with database
		$conn = new Connection('tolmai');

		//select column family
		$column_family= new ColumnFamily($conn , 'tm_logs');

		//single insert
		$column_family-> insert($name,array("nameproj" => $nameproj));
		$column_family-> insert($name,array("language1" => $language1));
		$column_family-> insert($name,array("plang1" => $plang1));
		$column_family-> insert($name,array("language2" => $language2));
		$column_family-> insert($name,array("plang2" => $plang2));
		$column_family-> insert($name,array("other" => $other));
		$column_family-> insert($name,array("pother" => $pother));
	}
	catch(Exception $x){
		error_log($x);
	}
}
?>