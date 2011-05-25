<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function search_lang_proj($lang){

$conn = new Connection('DBCola');

$column_lang= new ColumnFamily($conn,'language');

$pesquisa = $column_lang ->get($lang);
return $pesquisa;
}


?>