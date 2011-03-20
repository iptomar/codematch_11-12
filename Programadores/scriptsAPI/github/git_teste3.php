<?php

	//lista os dados do utilizador apocas - exemplo

	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/user/show/apocas");
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);

	//Imprime a lista de resultados
	
		print_r(" Nome: ".$json->user->name." Localizacao: ".$json->user->location." Blog: ".$json->user->blog." Email: ".$json->user->email);
		print_r(" &nbsp &nbsp Repositorios publicos: ".$json->user->public_repo_count." Numero de Seguidores: ".$json->user->followers_count);

?>