<?php
	//lista todos os utilizadores que tem o parametro de pesquisa "sem"

	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/organizations/github");
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);
	
	print_r("Nome: ".$json->organization->name." Organizacao ".$json->organization->company." Localizacao: ".$json->organization->location." Username: ".$json->organization->blog."<br>");


?>