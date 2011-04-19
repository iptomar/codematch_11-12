<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
//This function inserts/update data on DB and returns the function stats due to sucess or fail of the operation
// Usage:
// require ("db_insert.php"); -> on API search script file
// db_insert(<arguments>); 11 arguments accepted - if some are inexistent use Zero value to maintain DB structure

function insert_db($name,$fullname,$source,$repo,$lang_P,$lang_S,$lang_T,$author,$created,$updated,$logo){
try{

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//single insert
$column_family-> insert($name,array("tm_fullname" => $fullname));
$column_family-> insert($name,array("tm_source" => $source));
$column_family-> insert($name,array("tm_repository" => $repo));
$column_family-> insert($name,array("tm_language_P" => $lang_P));
$column_family-> insert($name,array("tm_language_S" => $lang_S));
$column_family-> insert($name,array("tm_language_T" => $lang_T));
$column_family-> insert($name,array("tm_author" => $author));
$column_family-> insert($name,array("tm_date_c" => $created));
$column_family-> insert($name,array("tm_date_l" => $updated));
$column_family-> insert($name,array("tm_logo" => $logo));


}catch(Exception $x){
	error_log($x);
}
}

?>