<?php
//funcao para ir buscar o codigo do helloworld
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');
function get_hello($hello){
try{
$conn = new Connection('DBCola');
//converte para maiusculas
$aux= strtoupper($hello);
//select databases
$column_hello= new ColumnFamily($conn,'helloworld');
//get linguagem
$cod=$column_hello->get($aux);
return ($cod);
}	
	catch(Exception $x){
		error_log($x);
	}
}
?>