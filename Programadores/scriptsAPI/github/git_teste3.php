<?php

	print_r("Dados do utilizador apocas");

	//Definição dos parametros da pesquisa
	$ch = @curl_init(); //iniciar uma nova sessão
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/user/show/apocas"); //pesquisar por utilizadores que contenham 'apocas' no nome de utilizador
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utilizar como agente de pesquisa o Googlebot versão 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //definir o retorno como string
	$page = curl_exec( $ch); //executa a sessão estabelecida com as opções definidas previamente
	curl_close($ch); //encerra a sessão e liberta os recursos utilizados
	
	$json = json_decode($page); //descodifica uma string json

	//Imprime os resultados
	print_r(" Nome: ".$json->user->name." Localizacao: ".$json->user->location." Blog: ".$json->user->blog." Email: ".$json->user->email."<br>"); //imprime nome, localização, blog e email
	print_r(" &nbsp &nbsp Repositorios publicos: ".$json->user->public_repo_count." Numero de Seguidores: ".$json->user->followers_count."<br> <br>"); //imprime o numero de repositorios publicos e numero de seguidores 

?>