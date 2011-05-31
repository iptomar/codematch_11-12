<?php

//conta o numero de projectos por repositorio
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function total($repo){
try{
$conn = new Connection('DBCola');
$column_repo = new ColumnFamily($conn,'repos');
//converte a primeira letra para maiscula
$aux= ucfirst($repo);
//vai buscar o numero de projectos do repositorios
$pesquisa = $column_repo ->get_count($aux);
return ($pesquisa);
}	
	catch(Exception $x){
		error_log($x);
	}
}
?>