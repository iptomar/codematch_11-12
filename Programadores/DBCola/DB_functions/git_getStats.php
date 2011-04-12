<?php

//This function retrieves data on DB

try{
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//without arguments returns evry column in the row - default number 100
$result =$column_family->get('tm');
//return results
return $result;

}catch (Exception $x){
	$status = "Fail to retrieve data" ;
	return $status;
}

?>