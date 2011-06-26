<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all projects from a given language
//input: Language <string>
function search_langu_proj($lang){

$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'language');
try
{
//search language database
$pesquisa = $column_lang ->get($lang,null,"","",false,100000,null,null);

//return $pesquisa;
foreach ($pesquisa as $key => $value){
 echo "<p><b>- </b>".$value.".</p>";
}
}
catch(Exception $e)
{
	echo "Nao foram encontrados resultados";
}
}
$lang = $_GET['dat'];
$lang = strtoupper($lang);
search_langu_proj($lang);
//search_langu_proj("PHP");
?>