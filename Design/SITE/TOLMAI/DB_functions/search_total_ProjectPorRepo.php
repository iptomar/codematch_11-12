<?php

//conta o numero de projectos por repositorio
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function total($repo){
$conn = new Connection('DBCola');
$column_repo = new ColumnFamily($conn,'repos');

$pesquisa = $column_repo ->get_count($repo);
return ($pesquisa);
}
?>