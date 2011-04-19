<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

function get_Project($name){

try{

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//search project
$result=$column_family->get($name);

//return project details if exists
return $result;

}catch(Exception $x){
	//catch error if exists
	error_log($x);
}
}


?>