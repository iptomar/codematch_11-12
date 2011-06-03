<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

//this function search and get all details from a given project
//input: project <string>
//output: null (string) if dont find project
//        data if hit
function search_project_detail($proj){
$proj = strtolower($proj);
$no = "null";

$conn = new Connection('DBCola');

//selects projects database
$column_detail= new ColumnFamily($conn,'projects');

try{
//search projects database
$pesquisa = $column_detail ->get($proj,null,"","",false,100000,null,null);

//auxiliary vars
 $in=0;
 $res = array();
 $match= array();

 foreach ($pesquisa as $key => $value) {
		foreach($value as $ikey => $iValue){
			$res[$in] = $iValue;	
			$in++; }
	}

//return results
//order -> data_c - data_l - description - logo,url
return $res;
}catch (Exception $x){
	return $no;
	}
}


?>