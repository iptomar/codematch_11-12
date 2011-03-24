<?php
	print_r("Dados de uma organização (github) <br><br>");
	//pagina do api
	$request = 'http://github.com/api/v2/json/organizations/github';
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$jsonobj = json_decode($response);
	print_r("Nome: ".$jsonobj->organization->name." Organizacao ".$jsonobj->organization->company."<br> Localizacao: ".$jsonobj->organization->location." Blog: ".$jsonobj->organization->blog."<br>"); //imprime o nome da organização, localização e blog


?>