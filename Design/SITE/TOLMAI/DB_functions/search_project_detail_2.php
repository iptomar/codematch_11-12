<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all details from a given project
//input: project <string>
function search_project_detaill($proj){

$conn = new Connection('DBCola');

//selects projects database
$column_detail= new ColumnFamily($conn,'projects');

try{
//search projects database
$pesquisa = $column_detail ->get($proj,null,"","",false,100000,null,null);
//return results
//return $pesquisa;
foreach ($pesquisa as $key => $value){
	$count++;
	if($key == "date_c")
		//echo "<p><b>Data de criacao- </b>".$value.".</p>";
		$date_c=$value;
	else if($key == "date_l");
		//echo "<p><b>Data de actualizacao- </b>".$value.".</p>";
		$date_l=$value;
	else if($key == "source")
		//echo "<p><b>Data de actualizacao- </b>".$value.".</p>";
		$source=$value;
		}

	
	/*echo"<div class='divRepoProjDescricao'><div class='divImagDescriRepoProj'><img src='images/logogithub.png' class='imageRepoDesProj'/></div><div class='descricaoRepoProj'><div class='nomeRepoProj'>".$proj."</div><div class='linguagensRepoProj'><a href='."$source."' target='blank' style='margin:10px;'>".$source"</a></div><div class='descricaoallProjProj'>Data de criacao: ".$data_c."</div></div></div>";*/
	
	echo $proj;
	//return $proj."-";

}

catch(Exception $e)
{
						//if($e instanceof cassandra_NotFoundException)
						echo "Não foram encontrados resultados";
}




}
$proj = $_GET['dat'];
search_project_detaill($proj);
?>