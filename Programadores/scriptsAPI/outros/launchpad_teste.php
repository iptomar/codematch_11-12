<?php
	$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.launchpad.net/1.0/projects");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);
	//mostra os ultimos projectos registados no Launchpad
	echo "<h2>Ultimos Projectos registados no LaunchPad.</h2>";
	echo "Total Projectos: ".count($json->entries);
	echo "<br><br>";
	foreach($json->entries as $arg) {
		//filtro criado para retirar o nome do owner
		preg_match('/1.0\/~(.*)/', $arg->owner_link , $match);
		//mostra o nome do projecto, autor
		print_r("<b>Projecto:</b> ".$arg->name." - <b>Autor:</b> <a href='".$arg->owner_link."'>".$match[1]."</a><br>");
	}
	//mostra as opcoes/tag de cada projecto
	echo "<br><br><hr>";
	echo "<h2>Opções/Tags de cada Projecto.</h2>";
	echo "Mais info em: <b>https://launchpad.net/+apidoc/1.0.html#project</b>";
	echo "<br><br>";
	foreach($json->entries[1] as $key => $value) {
		//mostra as opcoes/tags de cada projecto bem como o seu valor
		print_r("<b>[".$key."]</b> => ".$value."<br>");
	}
?>