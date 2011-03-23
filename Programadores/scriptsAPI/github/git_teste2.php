<?php
	print_r("Apresentar utilizadores com 'sem' <br><br>");

	//Defini��o dos parametros da pesquisa
	$ch = @curl_init(); //iniciar uma nova sess�o
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/user/search/sem"); //pesquisar por utilizadores que contenham 'sem' no nome de utilizador
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utilizar como agente de pesquisa o Googlebot vers�o 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //definir o retorno como string
	$page = curl_exec( $ch); //executa a sess�o estabelecida com as op��es definidas previamente
	curl_close($ch); //encerra a sess�o e liberta os recursos utilizados
	
	$json = json_decode($page);//descodifica uma string json

	//Imprime a lista de resultados
	foreach($json->users as $args) { //para cada utilizador encontrado na pesquisa:
		print_r("<b>Nome:</b> ".$args->name." <b>Localizacao:</b> ".$args->location." <b>Username:</b> ".$args->username."<br>"); //imprime o nome, a localiza��o e o username
		print_r(" &nbsp &nbsp <b>User ID:</b> ".$args->id." <b>Repositorios:</b> ".$args->repos." <b>Seguidores:</b> ".$args->followers." <b>Valor Incidencia:</b> ".$args->score." <br> <br>"); //imprime o userID, o numero de reposit�rios, o n�mero de seguidores e o valor de incid�ncia.
	}	
?>