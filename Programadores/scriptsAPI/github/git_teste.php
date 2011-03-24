<?php
	print_r("Apresentar reposit�rios de 'ruby' + 'testing' <br><br>");
	//pagina do api
	$request = 'http://github.com/api/v2/json/repos/search/ruby+testing';
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$jsonobj = json_decode($response);
	//Imprime os resultados
	foreach($jsonobj->repositories as $arg) { //para cada reposit�rio encontrado na pesquisa:
		print_r("<b>Projecto: </b>".$arg->name." - <b>Autor: </b><a href='https://bitbucket.org/".$arg->username."/'>".$arg->username."</a><br>"); //imprime o nome e o link para o autor
		print_r("<b>Descricao: </b>".$arg->description."<br>"); //imprime a descri��o do projecto
		print_r("<b>Seguidores: </b>".$arg->followers." - <b>Watchers: </b>".$arg->watchers." - <b>Criado a: </b>".$arg->created_at."<br>"); //imprime o n�mero de seguidores e de watchers.
		print_r("<br><br>");
	}	
?>