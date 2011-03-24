<?php
	print_r("Apresentar repositórios de 'ruby' + 'testing' <br><br>");
	//pagina do api
	$request = 'http://github.com/api/v2/json/repos/search/ruby+testing';
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$jsonobj = json_decode($response);
	//Imprime os resultados
	foreach($jsonobj->repositories as $arg) { //para cada repositório encontrado na pesquisa:
		print_r("<b>Projecto: </b>".$arg->name." - <b>Autor: </b><a href='https://bitbucket.org/".$arg->username."/'>".$arg->username."</a><br>"); //imprime o nome e o link para o autor
		print_r("<b>Descricao: </b>".$arg->description."<br>"); //imprime a descrição do projecto
		print_r("<b>Seguidores: </b>".$arg->followers." - <b>Watchers: </b>".$arg->watchers." - <b>Criado a: </b>".$arg->created_at."<br>"); //imprime o número de seguidores e de watchers.
		print_r("<br><br>");
	}	
?>