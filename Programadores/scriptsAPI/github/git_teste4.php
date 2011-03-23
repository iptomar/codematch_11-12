<?php
	print_r("Dados de uma organização (github) <br><br>");

	//Definição dos parametros da pesquisa
	$ch = @curl_init(); //iniciar uma nova sessão
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/organizations/github"); //pesquisar por organizações que contenham 'github'
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utilizar como agente de pesquisa o Googlebot versão 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //definir o retorno como string
	$page = curl_exec( $ch); //executa a sessão estabelecida com as opções definidas previamente
	curl_close($ch);//encerra a sessão e liberta os recursos utilizados
	
	$json = json_decode($page);//descodifica uma string json
	
	print_r("Nome: ".$json->organization->name." Organizacao ".$json->organization->company."<br> Localizacao: ".$json->organization->location." Blog: ".$json->organization->blog."<br>"); //imprime o nome da organização, localização e blog


?>