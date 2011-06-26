<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all projects from a given author
//input: repository <string>
function search_autho($authr){

$conn = new Connection('DBCola');

//selects author database
$column_authr = new ColumnFamily($conn,'author');

try
{

//search author database
$pesquisa = $column_authr ->get($authr,null,"","",false,100000,null,null);

//return results
//return $pesquisa;
$count=0;
foreach ($pesquisa as $key => $value){
 //echo "<p><b>- </b>".$value.".</p>";
 echo "<p><p >-<b></b><a id='".$value."' href='#' style='color: rgb(0,0,0)' onclick='toProjectosfromrepository(this.id)'>".$value."</a></p></p><p></p>";
 $count++;
}
}
catch(Exception $e)
{
	echo "Não foram encontrados resultados";
}
}
$authr = $_GET['dat'];
search_autho($authr);

?>