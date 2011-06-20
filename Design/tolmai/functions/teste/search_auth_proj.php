<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

//this function search the author for a given project
//input: project <string>
//output: null (string) if dont find project
//        data if hit

function search_auth_proj($proj){
$proj = strtolower($proj);
$no = "null";

$conn = new Connection('DBCola');

//select repository database
$column_repo = new ColumnFamily($conn,'author');

try{
//search repository database
$pesquisa = $column_repo ->get_range("","",10000);

//auxiliary vars
 $in=0;
 $res = array();
 $match= array();
 
 //search all author for a match of a given author
foreach ($pesquisa as $key => $value) {
	  //check projects for hits
	   foreach($value as $ikey => $iValue){
	   $res[$in] = $iValue;	
	   //compare given projects with author/project hits
	   if(strcmp($proj,$res[$in])==0){
		 $match[$in]=$key;
	   }
	   $in++; }
	   
}
	    
//return author of a given project
print_r($match);
}catch (Exception $x){
	print_r($no);
	}
}
search_auth_proj("liveusb");
?>