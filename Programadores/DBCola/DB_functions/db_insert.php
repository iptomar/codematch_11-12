<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
//This function inserts/update data on DB and returns the function stats due to sucess or fail of the operation
// Usage:
// include 'db_insert.php'; -> on API search script file
// db_insert(<arguments>); 10 arguments accepted - if some are inexistent use Zero value to maintain DB structure

function insert_db($Name,$Fullname='',$Source,$Repo,$Author,$Lang_='',$LsUp,$Logo=''){
try{


//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

$comp = count($Author);
$cp = count($Lang);

//insert column family rows
//currently Database Proposed Schema
//Index column -> Name - Project Name (index key) (ex: "mozilla" stays "mozilla firefox 4")
//Single columns ->tm_fullname - fullname; tm_source - project url; tm_repository - repository url ;
// tm_author [Array]- projects author; tm_language [Array] - project languages ; tm_lastupdate - projects last update; tm_logo - projects logo url
//SuperColumn tm_language -> To decide how many entries will take, this function draft takes 3 entries ordered by project relevance
$column_family->insert($Name,array('tm_fullname' =>$Fullname,'tm_source' =>$Source,'tm_repository' =>$Repo,'tm_lastupdate' =>$LsUp, 'tm_logo' =>$Logo));

//lang insert
for ($l = 0; $i <=cp; $l++){
	$column_family -> insert($Name,array('tm_language' => array($Lang_[$l] => $Lanf_[$l])));
}

//author insert
for($i = 0; $i <= $comp; $i++){
	$column_family -> insert($Name,array('tm_author' => array($Author[$i] => $Author[$i])));
}

}catch(Exception $x){
	error_log($x);
}
}
//Json Representation
//  {
//  "$Name" : {
//	  "tm_fullname : Value"
//    "tm_source" : "Value",
//    "tm_repository" : "Value",
//    "tm_author" : "Value",
//    "tm_language" : "Value", <-Supercolumn
//    "tm_lastupdate" : "Value",
//    "tm_logo" : "Value"
//  }

?>