<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
//This function inserts/update data on DB and returns the function stats due to sucess or fail of the operation
// Usage:
// require ("db_insert.php"); -> on API search script file
// db_insert(<arguments>); 11 arguments accepted - if some are inexistent use Zero value to maintain DB structure

function insert_db($name, $fullname, $source, $repo, $author, $lang, $date, $logo){
   $lan_array = array_map("strtoupper", $lang);
	try{
		//make connection with database
		$conn = new Connection('tolmai');

		//select column family
		$column_family= new ColumnFamily($conn , 'test');

		//single insert
		$column_family-> insert($name,array("tm_fullname" => $fullname));
		$column_family-> insert($name,array("tm_source" => $source));
		$column_family-> insert($name,array("tm_repository" => $repo));
		if(isset($lang[0])){ //1º lingua no array
			$column_family-> insert($name,array("tm_language_P" =>$lan_array[0])); 
		} else {
			$column_family-> insert($name,array("tm_language_P" => "N/A"));
		}	
		if(isset($lang[1])){ //2º lingua no array
			$column_family-> insert($name,array("tm_language_S" => $lan_array[1])); 
		} else {
			$column_family-> insert($name,array("tm_language_S" => "N/A"));
		}			
		if(isset($lang[2])){ //3º lingua no array
			$column_family-> insert($name,array("tm_language_T" => $lan_array[2])); 
		} else {
			$column_family-> insert($name,array("tm_language_T" => "N/A"));
		}
		$owner="";
		foreach($author as $arg) { //percorre o array do autor e junta numa string separados por ;
			$owner .= $arg.";";
		}
		$column_family-> insert($name,array("tm_author" => $owner));
		$column_family-> insert($name,array("tm_date_c" => $date[0])); //data criacao
		$column_family-> insert($name,array("tm_date_l" => $date[1])); //data last update
		$column_family-> insert($name,array("tm_logo" => $logo));
	}
	catch(Exception $x){
		error_log($x);
	}
}
?>