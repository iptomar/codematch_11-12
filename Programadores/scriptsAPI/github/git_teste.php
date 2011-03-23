<?php
	print_r("Apresentar reposit�rios de 'ruby' + 'testing' <br><br>");
	
	//Defini��o dos parametros da pesquisa
	$ch = @curl_init(); //iniciar uma nova sess�o
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/repos/search/ruby+testing"); //pesquisar por reposit�rios que contenham as palavras-chave "ryby" e "testing"
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utilizar como agente de pesquisa o Googlebot vers�o 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //definir o retorno como string
	$page = curl_exec( $ch); //executa a sess�o estabelecida com as op��es definidas previamente
	curl_close($ch); //encerra a sess�o e liberta os recursos utilizados
	
	$json = json_decode($page); //descodifica uma string json

	//Imprime os resultados
	foreach($json->repositories as $arg) { //para cada reposit�rio encontrado na pesquisa:
		print_r("<b>Projecto: </b>".$arg->name." - <b>Autor: </b><a href='https://bitbucket.org/".$arg->username."/'>".$arg->username."</a><br>"); //imprime o nome e o link para o autor
		print_r("<b>Descricao: </b>".$arg->description."<br>"); //imprime a descri��o do projecto
		print_r("<b>Seguidores: </b>".$arg->followers." - <b>Watchers: </b>".$arg->watchers." - <b>Criado a: </b>".$arg->created_at."<br>"); //imprime o n�mero de seguidores e de watchers.
		print_r("<br><br>");
	}	
?>