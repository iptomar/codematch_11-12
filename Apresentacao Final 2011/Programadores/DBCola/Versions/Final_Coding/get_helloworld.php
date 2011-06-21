<?php
//this function function selects the code HELLOWORLD
//input: languages 
//output: null (string) if dont find languages
//        data if hit
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');
function get_hello($hello){
$no = "null";
try{
$conn = new Connection('DBCola');
//converts the letter to uppercase
$aux= strtoupper($hello);
//select databases
$column_hello= new ColumnFamily($conn,'helloworld');
//select languages
$cod=$column_hello->get($aux);
return ($cod);
}	
	catch(Exception $x){
		return($no);
	}
}
?>