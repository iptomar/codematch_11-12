<?php
	$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.bitbucket.org/1.0/users/jespern/");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	$json = json_decode($page);
	//mostra os projectos do utilizador jespern
	echo "<h2>Projectos do utilizador: jespern.</h2>";
	echo "Total Projectos: ".count($json->repositories);
	echo "<br><br>";
	//slug serve de nome para o URL do projecto
	//mostra o nome do projecto
	//no bitbucket as tag's do projecto não têm opção de ver quem é o owner do projecto
	foreach($json->repositories as $arg) {
		print_r("<b>Projecto:</b> ".$arg->name." - <b>Autor:</b> <a href='https://bitbucket.org/".$json->user->username."/".trim($arg->slug)."'>".trim($arg->slug)."</a><br>");
	}
	//mostra as opcoes/tag de cada projecto
	echo "<br><br><hr>";
	echo "<h2>Opções/Tags de cada Projecto.</h2>";
	echo "Mais info em: <b>http://confluence.atlassian.com/display/BBDEV/Repositories</b>";
	echo "<br><br>";
	foreach($json->repositories[1] as $key => $value) {
		print_r("<b>[".$key."]</b> => ".$value."<br>");
	}
?>