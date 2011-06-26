<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');


//this function search and get all projects from a given repository
//input: repository <string>
function search_repo($repo){

$conn = new Connection('DBCola');

//select repository database
$column_repo = new ColumnFamily($conn,'repos');

//search repository database
$pesquisa = $column_repo ->get($repo,null,"","",false,100000,null,null);

//return results
print_r($pesquisa);
}
search_repo("Launchpad");

?>