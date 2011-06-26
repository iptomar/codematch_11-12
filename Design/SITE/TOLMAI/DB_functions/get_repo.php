<?php

//retorna os dados dos repositorios
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

	function info($repo){
		try{
		//make connection with database
		$conn = new Connection('tolmai');

		//select column family
		$column_family= new ColumnFamily($conn , 'tm_repo');

		//converte a primeira letra para maiscula
		$repo1= ucfirst($repo);
		$aux=$column_family->get($repo1);
		foreach ($aux as $key => $value){
	$count++;
	if($key == "description")
		echo "<p><b>Descricao- </b>".$value.".</p>";
	else if($key == "url")
		echo "<p><b>url- </b>".$value.".</p>";
	else if($key == "logo")
		echo "";
	else
		echo "<p>--------------------------------------</p>";
}
	//print_r ($aux);

	}
	catch(Exception $x){
		error_log($x);
	}
}
$repo = $_GET['dat'];
info($repo);
?>