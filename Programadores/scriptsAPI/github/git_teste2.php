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
	
	foreach($json->users as $arg) {
		print_r("Nome: ".$args->name." Localizacao: ".$args->location." Username: ".$args->username."<br>");
		print_r(" &nbsp &nbsp User ID: ".$args->id." Repositorios: ".$args->repos." Seguidores: ".$args->followers." Valor Incidencia: ".$args->score." <br> <br>");
	}	
?>