<?php
	//joão dinis nº11472
	//Obtem todos os detalhes do projecto
	
	function obter_github($projecto){
		require_once('phpcassa/connection.php');
		require_once('phpcassa/columnfamily.php');
		$conn = new Connection('Keyspace1');
		$column_family = new ColumnFamily($conn, 'starndard2');
		$request = 'http://github.com/api/v2/json/repos/search/'.$projecto;
		//le o ficheiro para uma string
		$response = file_get_contents($request);		
		//descodifica uma string json
		$jsonobj = json_decode($response);
		//Imprime os resultados
		foreach($jsonobj->repositories as $arg) { 
			$column_family->insert($num, array('NomeProj' => $arg->name));
			$column_family->insert($num, array('AutorProj' => $arg->username));
			$column_family->insert($num, array('CriaProj' => $arg->created_at));
			$column_family->insert($num, array('language' => $arg->language));	
			 $num++;
	}
?>