<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all projects from a given author
//input: repository <string>
function search_author($authr){

$conn = new Connection('DBCola');

//selects author database
$column_authr = new ColumnFamily($conn,'author');

//search author database
$pesquisa = $column_authr ->get($authr,null,"","",false,100000,null,null);

//return results
print_r($pesquisa);
}

search_author("X");
?>