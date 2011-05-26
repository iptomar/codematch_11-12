<?php
$word = trim($_POST['word']); //palavra a pesquisar
$lenght = trim($_POST['tamanho']); //quantas pesquisas
//controla o valor de pesquisas inserido
if (($lenght < 0) || ($lenght > 150) || (empty($lenght))) {
	$lenght = 75;
}
//metodo de post no form da html
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.launchpad.net/1.0/people?text=$word&ws.op=find&ws.start=$lenght&ws.size=$lenght");
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);
	//mostra o total de projectos
	print_r("<b>Total Projectos:</b> ".$json->total_size."<br><br>");
	if (!isset($_POST['mostra_array'])) {
		$i=1;
		//mostra o nome do projecto e o nome do autor
		foreach($json->entries as $arg) {
			//filtro criado para retirar o nome do owner
			preg_match('/1.0\/~(.*)/', $arg->owner_link , $match);
			//mostra o nome do projecto, autor
			print_r("".$i." - <b>Projecto:</b> ".$arg->name." - <b>Autor:</b> <a href='".$arg->owner_link."'>".$match[1]."</a><br>");
			$i++;
		}
	}
	else {
		echo "<pre>";
		//mostra array
		print_r($json);
		echo "</pre>";
	}
	echo "<hr>";
}
?>
<html>
<head>
<title></title>
</head>
<body>
	<h1>Pesquisar por utilizador no Launchpad.</h1>
	<hr><br>
	<form name="form1" method="post" action="" align="center">
		<b style="font-size:12px;">Pesquisar por:</b> <input name="word" type="text" id="word"><br><br>
		<b style="font-size:12px;">Quantas pesquisas (0-150) (default: 75):</b> <input name="tamanho" type="text" id="tamanho"><br><br>
		<input type="checkbox" name="mostra_array[]" value="No"> Mostrar em array</input><br><br>
		<input type="submit" name="Submit" value="Pesquisar ...">
	</form>   
</body>
</html>