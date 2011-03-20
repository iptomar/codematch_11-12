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
	
	
	foreach($json->user as $arg) {
		print_r(" Nome: ".$args->name." Localizacao: ".$args->location." Blog: ".$args->blog." Email: ".$args->email);
		print_r(" Repositorios publicos: ".$args->public_repo_count." Numero de Seguidores: ".$args->followers_count);
	}	
?>