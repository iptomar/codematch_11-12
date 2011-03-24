<?php
	print_r("Dados do utilizador apocas <br><br>");
	//pagina do api
	$request = 'http://github.com/api/v2/json/user/show/apocas';
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$jsonobj = json_decode($response);
	//Imprime os resultados
	print_r(" Nome: ".$jsonobj->user->name." Localizacao: ".$jsonobj->user->location." Blog: ".$jsonobj->user->blog." Email: ".$jsonobj->user->email."<br>"); //imprime nome, localização, blog e email
	print_r(" &nbsp &nbsp Repositorios publicos: ".$jsonobj->user->public_repo_count." Numero de Seguidores: ".$jsonobj->user->followers_count."<br> <br>"); //imprime o numero de repositorios publicos e numero de seguidores 

?>