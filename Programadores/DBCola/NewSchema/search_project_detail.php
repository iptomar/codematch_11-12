<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

//this function search and get all details from a given project
//input: project <string>
function search_project_detail($proj){

$conn = new Connection('DBCola');

//selects projects database
$column_detail= new ColumnFamily($conn,'projects');


//search projects database
$pesquisa = $column_detail ->get($proj,null,"","",false,100000,null,null);

//return results
return $pesquisa;
}


?>