<?php
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/repos/search/ruby+testing");
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);

	foreach($json->repositories as $arg) {
		print_r("<b>Projecto: </b>".$arg->name." - <b>Autor: </b><a href='https://bitbucket.org/".$arg->username."/'>".$arg->username."</a><br>");
		print_r("<b>Descricao: </b>".$arg->description."<br>");
		print_r("<b>Seguidores: </b>".$arg->followers." - <b>Watchers: </b>".$arg->watchers." - <b>Criado a: </b>".$arg->created_at."<br>");
		print_r("<br><br>");
	}	
?>