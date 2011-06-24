<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('tolmai');

$column_family = new ColumnFamily($conn, 'tm');

	
	//pagina do api
	$request = 'http://github.com/api/v2/json/repos/search/ruby+testing';
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$jsonobj = json_decode($response);
	//Imprime os resultados
	$num=0;
	$num_rand=0;
	foreach($jsonobj->repositories as $arg) { //para cada repositório encontrado na pesquisa:
		//gera um numero aleatorio para a posição em que se vai inserir
		if($num	> 0){
			$num_rand=rand(0,$num);
		}
		
		$re = $column_family->insert($num_rand, array('tm_fullname' => $arg->name));
		$re = $column_family->insert($num_rand, array('tm_author' => $arg->username));
		$re = $column_family->insert($num_rand, array('tm_lastupdate' => $arg->pushed_at));
		$re = $column_family->insert($num_rand, array('tm_language' => $arg->language));
		
		$num++;
	}
	for($qnt=0;$qnt<$num; $qnt++)
	{
	//gera um numero aleatorio para a posição que se vai aceder
	$num_rand=rand(0,$num-1);
	$re = $column_family->get($num_rand);
    print_r($re);
	}
	echo ($num);
	
?>
