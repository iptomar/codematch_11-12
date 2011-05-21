<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function search_repo($repo){

$conn = new Connection('DBCOla');

$column_repo = new ColumnFamily($conn,'repos');

$pesquisa = $column_repo ->get($repo);
return $pesquisa;
}


?>