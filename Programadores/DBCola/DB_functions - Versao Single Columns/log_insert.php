<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');



function insert_log($name,$nameproj, $lang, $plang){
   $lan_array = array_map("strtoupper", $lang);
	try{
		//make connection with database
		$conn = new Connection('tolmai');

		//select column family
		$column_family= new ColumnFamily($conn , 'tm_logs');

		//single insert
		$column_family-> insert($name,array("nameproj" => $nameproj));
		
			if(isset($lang[0])){ //1º lingua no array
			$column_family-> insert($name,array("language1" =>$lan_array[0])); 
		} else {
			$column_family-> insert($name,array("language1" => "N/A"));
		}	
		if(isset($lang[1])){ //2º lingua no array
			$column_family-> insert($name,array("language2" => $lan_array[1])); 
		} else {
			$column_family-> insert($name,array("language2" => "N/A"));
		}			
		if(isset($lang[2])){ //3º lingua no array
			$column_family-> insert($name,array("language3" => $lan_array[2])); 
		} else {
			$column_family-> insert($name,array("language3" => "N/A"));
		}
		if(isset($lang[2])){ //4º lingua no array
			$column_family-> insert($name,array("other" => $lan_array[3])); 
		} else {
			$column_family-> insert($name,array("other" => "N/A"));
		}
		
		
		if(isset($plang[0])){ // % da 1º lingua no array
			$column_family-> insert($name,array("plang1" =>$plang[0])); 
		} else {
			$column_family-> insert($name,array("plang1" => "N/A"));
		}	
		if(isset($plang[1])){ //% da2º lingua no array
			$column_family-> insert($name,array("plang2" => $plang[1])); 
		} else {
			$column_family-> insert($name,array("plang2" => "N/A"));
		}			
		if(isset($plang[2])){ //% da3º lingua no array
			$column_family-> insert($name,array("plang3" => $plang[2])); 
		} else {
			$column_family-> insert($name,array("plang4" => "N/A"));
		}
		if(isset($plang[3])){ //% da4º lingua no array
			$column_family-> insert($name,array("pother" => $plang[3])); 
		} else {
			$column_family-> insert($name,array("pother" => "N/A"));
		}
	}
	catch(Exception $x){
		error_log($x);
	}
}
?>