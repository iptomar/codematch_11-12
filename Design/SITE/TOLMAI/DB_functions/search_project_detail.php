<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

//this function search and get all details from a given project
//input: project <string>
function search_project_detail($proj){

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
		echo "<p><b>Data de criacao- </b>".$value.".</p>";
	else if($key == "date_l")
		echo "<p><b>Data de actualizacao- </b>".$value.".</p>";
	else if($key == "source")
		echo "<p><b>Link- </b>".$value.".</p>";
	else if($key == "logo")
	echo "";
	else
		echo "<p>--------------------------------------</p>";
}

}

catch(Exception $e)
{
						//if($e instanceof cassandra_NotFoundException)
						echo "Não foram encontrados resultados";
}




}
$proj = $_GET['dat'];
search_project_detail($proj);
?>