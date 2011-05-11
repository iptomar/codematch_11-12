<?php

//João Dinis nº11472
//Faz um 1 milhão de gets ao projecto surl.

//This function retrieves data on DB
for($i=0;$i<1000000;$i++){
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

$result =$column_family->get('surl');
//return results
print_r ($result);
print_r("<br>");
}

?>