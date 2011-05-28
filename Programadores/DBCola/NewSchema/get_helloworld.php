<?php
//funcao para ir buscar o codigo no helloworld
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');
function get_hello($hello){
$conn = new Connection('DBCola');

//select databases
$column_hello= new ColumnFamily($conn,'helloworld');

$aux=$column_hello->get($hello);
return ($aux);
}

?>