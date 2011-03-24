<?php
	print_r("Apresentar utilizadores com 'sem' <br><br>");
	//pagina do api
	$request = 'http://github.com/api/v2/json/user/search/sem';
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$jsonobj = json_decode($response);
	//Imprime a lista de resultados
	foreach($jsonobj->users as $args) { //para cada utilizador encontrado na pesquisa:
		print_r("<b>Nome:</b> ".$args->name." <b>Localizacao:</b> ".$args->location." <b>Username:</b> ".$args->username."<br>"); //imprime o nome, a localizacao e o username
		print_r(" &nbsp &nbsp <b>User ID:</b> ".$args->id." <b>Repositorios:</b> ".$args->repos." <b>Seguidores:</b> ".$args->followers." <b>Valor Incidencia:</b> ".$args->score." <br> <br>"); //imprime o userID, o numero de repositorios, o numero de seguidores e o valor de incidencia.
	}	
?>