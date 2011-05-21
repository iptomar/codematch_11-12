<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function search_author($authr){

$conn = new Connection('DBCOla');

$column_authr = new ColumnFamily($conn,'author');

$pesquisa = $column_authr ->get($authr);
return $pesquisa;
}


?>