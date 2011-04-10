<?php

//This function inserts/update data on DB and returns the function stats due to sucess or fail of the operation
// Usage:
// include 'db_insert.php'; -> on API search script file
// db_insert(<arguments>); 9 arguments accepted - if some are inexistent use Zero value to maintain DB structure

function insert_db($Name,$Source,$Repo,$Author,$Lang_P,$Lang_S,$Lang_T,$LsUp,$Logo){
try{
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'Project');

//insert column family rows
//currently Database Proposed Schema
//Index column -> Project - Project Name (index key)
//Single columns ->tm_source - project url; tm_repository - repository url ; tm_author - projects author; tm_language - project languages [SuperColumn]; tm_lastupdate - projects last update; tm_logo - projects logo url
//SuperColumn tm_language -> To decide how many entries will take, this function draft takes 3 entries ordered by project relevance
$column_family->insert('$Name',array('tm_source' =>$Source,'tm_repository' =>$Repo, 'tm_author' =>$Author, 'tm_language' =>array('tm_Main' => $Lang_p, 'tm_Secundary' => $Lang_S, 'tm_terciary' => $Lang_T), 'tm_lastupdate' =>$LsUp, 'tm_logo' =>$Logo));
$status ="Sucess to insert / update DB";
return $status;

}catch(Exception $x){
	$status = "Fail to insert / update DB" ;
	return $status;
}
}
//Json Representation
//  {
//  "$Name" : {
//    "tm_source" : "Value",
//    "tm_repository" : "Value",
//    "tm_author" : "Value",
//    "tm_language" : "Value",
//    "tm_lastupdate" : "Value",
//    "tm_logo" : "Value"
//  }

?>