<?php

	//lista todos os utilizadores que tem o parametro de pesquisa "sem"

	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/user/search/sem");
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);

	//Imprime a lista de resultados
	
	foreach($json->users as $args) {
		print_r("<b>Nome:</b> ".$args->name." <b>Localizacao:</b> ".$args->location." <b>Username:</b> ".$args->username."<br>");
		print_r(" &nbsp &nbsp <b>User ID:</b> ".$args->id." <b>Repositorios:</b> ".$args->repos." <b>Seguidores:</b> ".$args->followers." <b>Valor Incidencia:</b> ".$args->score." <br> <br>");
	}	
?>