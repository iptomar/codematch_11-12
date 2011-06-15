<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

//this function search and get all projects from a given language
//input: Language <string>
function search_lang_proj($str){
$lang = strtoupper($str);
$no = "null";

$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'language');

try{
//search language database
$pesquisa = $column_lang ->get($lang,null,"","",false,100000,null,null);

//auxiliary var
 $in=0;
 $res = array();
 
foreach ($pesquisa as $key => $value) {
		$res[$in] = $value;	
		$in++;
		
}

//return results
print_r($res);
}catch (Exception $x){
	print_r($no);
	}
}
search_lang_proj("C++");


?>