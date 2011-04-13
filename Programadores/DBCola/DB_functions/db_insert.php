<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
//This function inserts/update data on DB and returns the function stats due to sucess or fail of the operation
// Usage:
// require ("db_insert.php"); -> on API search script file
// db_insert(<arguments>); 8 arguments accepted - if some are inexistent use Zero value to maintain DB structure

function insert_db($name,$fullname,$source,$repo,$lang,$author,$lastup,$logo){
try{

//counters
$comp = count($author);
$cp = count($lang);

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//single insert
$column_family-> insert($name,array("tm_fullname" =>array('fullname' => $fullname)));
$column_family-> insert($name,array("tm_source" =>array('source' => $source)));
$column_family-> insert($name,array("tm_repository" =>array('repository' => $repo)));

//lang insert
for ($l = 0; $l < $cp; $l++){
	$column_family -> insert($name,array('tm_language' => array($lang[$l] => $lang[$l])));
}


//author insert
for($i = 0; $i < $comp; $i++){
	$column_family -> insert($name,array('tm_author' => array($author[$i] => $author[$i])));
}

//single insert
$column_family-> insert($name,array("tm_lastupdate" =>array('lastup' => $lastup)));
$column_family-> insert($name,array("tm_logo" =>array('logo' => $logo)));

// $result = $column_family -> get($name);
// return $result;



}catch(Exception $x){
	error_log($x);
}
}

?>