<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
include_once('phpcassa/uuid.php');

//Top language
//output: null (string) if dont find project
//		  Array array of languages


function top_geral(){
$no = "null";
try{
$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'language');
$arr_lang = array();
$count =0;
//Selects all languages
$rows = $column_lang->get_range($key_start='', $key_finish='',1000000);
	
	foreach ($rows as $key=>$value) 
	{		
			//count the number of projects per languages
			$aux=$column_lang ->get_count($key);
					
			//language name
			$lang = $key;
			//language->nº
			if($lang!='N/A')
			$arr_lang[$lang] = $aux;
		}
		//orders the array
		arsort($arr_lang);
return ($arr_lang);
}	
	catch(Exception $x){
		return ($no);
	}
}
//top_geral();
?>