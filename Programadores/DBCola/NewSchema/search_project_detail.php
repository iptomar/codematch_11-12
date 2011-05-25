<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function search_project_detail($proj){

$conn = new Connection('DBCola');

$column_detail= new ColumnFamily($conn,'projects');

$pesquisa = $column_detail ->get($proj);
return $pesquisa;
}


?>