<?php
	print_r("Apresentar repositórios de 'ruby' + 'testing' <br><br>");
	
	//Definição dos parametros da pesquisa
	$ch = @curl_init(); //iniciar uma nova sessão
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/repos/search/ruby+testing"); //pesquisar por repositórios que contenham as palavras-chave "ryby" e "testing"
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utilizar como agente de pesquisa o Googlebot versão 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //definir o retorno como string
	$page = curl_exec( $ch); //executa a sessão estabelecida com as opções definidas previamente
	curl_close($ch); //encerra a sessão e liberta os recursos utilizados
	
	$json = json_decode($page); //descodifica uma string json

	//Imprime os resultados
	foreach($json->repositories as $arg) { //para cada repositório encontrado na pesquisa:
		print_r("<b>Projecto: </b>".$arg->name." - <b>Autor: </b><a href='https://bitbucket.org/".$arg->username."/'>".$arg->username."</a><br>"); //imprime o nome e o link para o autor
		print_r("<b>Descricao: </b>".$arg->description."<br>"); //imprime a descrição do projecto
		print_r("<b>Seguidores: </b>".$arg->followers." - <b>Watchers: </b>".$arg->watchers." - <b>Criado a: </b>".$arg->created_at."<br>"); //imprime o número de seguidores e de watchers.
		print_r("<br><br>");
	}	
?>