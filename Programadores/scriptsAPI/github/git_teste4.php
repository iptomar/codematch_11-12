<?php
	print_r("Dados de uma organiza��o (github) <br><br>");

	//Defini��o dos parametros da pesquisa
	$ch = @curl_init(); //iniciar uma nova sess�o
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/organizations/github"); //pesquisar por organiza��es que contenham 'github'
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utilizar como agente de pesquisa o Googlebot vers�o 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //definir o retorno como string
	$page = curl_exec( $ch); //executa a sess�o estabelecida com as op��es definidas previamente
	curl_close($ch);//encerra a sess�o e liberta os recursos utilizados
	
	$json = json_decode($page);//descodifica uma string json
	
	print_r("Nome: ".$json->organization->name." Organizacao ".$json->organization->company."<br> Localizacao: ".$json->organization->location." Blog: ".$json->organization->blog."<br>"); //imprime o nome da organiza��o, localiza��o e blog


?>