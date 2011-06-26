<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');


//this function search and get all projects from a given repository
//input: repository <string>
function search_repo($repo){
if($repo == "Github" || $repo == "Sourceforge" || $repo == "Launchpad")
{
	$conn = new Connection('DBCola');

	//select repository database
	$column_repo = new ColumnFamily($conn,'repos');

	//search repository database
	$pesquisa = $column_repo ->get($repo,null,"","",false,100000,null,null);

	//return results
	//return $pesquisa;
	
	
	$count=0;
	foreach ($pesquisa as $key => $value){
		//echo "<p><b>- </b>".$value.".</p>";
		echo "<p><p >-<b></b><a id='".$value."' href='#' style='color: rgb(0,0,0)' onclick='toProjectosfromrepository(this.id)'>".$value."</a></p></p><p></p>";
		
		$count++;
	}
 }
 else
 
	echo"Nao foram retornados dados.";
}
$repo = $_GET['dat'];
$repo = ucfirst($repo);
search_repo($repo);
?>