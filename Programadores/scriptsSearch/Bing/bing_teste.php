<?php
if ($_GET["word"]) {
	$resultados_a_mostrar = search($_GET["word"],$_GET["lenght"],$_GET["offset"]);
}
//#################################################################################################################################
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!(empty($_POST['word']))) {
		$lenght = trim($_POST['tamanho']); //quantas pesquisas
		//controla o valor de pesquisas inserido
		if (($lenght < 0) || ($lenght > 50) || (empty($lenght))) {
			$lenght = 10;
		}
		//radio button gihtub activado
		if ($_POST['radiobt']=='github') {
			$word = '"http://github.com/"site:github.com'; //palavra a pesquisar
			$resultados_a_mostrar = search($word,$lenght);
		}
		//radio button sourceforge activado
		else if ($_POST['radiobt']=='sourceforge') {
			$word = '"http://sourceforge.net/projects/"site:sourceforge.net';  //palavra a pesquisar
			$resultados_a_mostrar = search($word,$lenght);
		}
		//radio button launchpad activado
		else if ($_POST['radiobt']=='launchpad') {
			$word = '"http://launchpad.net/"site:launchpad.net';  //palavra a pesquisar
			$resultados_a_mostrar = search($word,$lenght);
		}
		//radio button bitbucket activado
		else if ($_POST['radiobt']=='bitbucket') {
			$word = '"http://bitbucket.org/"site:bitbucket.org';  //palavra a pesquisar
			$resultados_a_mostrar = search($word,$lenght);
		}
		//radio button google activado
		else if ($_POST['radiobt']=='google') {
			$word = '"http://code.google.com/p/"site:code.google.com';  //palavra a pesquisar
			$resultados_a_mostrar = search($word,$lenght);
		}
		//radio button activado do githuball
		else if ($_POST['radiobt']=='githuball') {
			$word = '"http://github.com/"site:github.com';  //palavra a pesquisar
			$i=0;
			file_put_contents("dados/dadosgithub.txt", "");
			while ($i <= 230) {
				file_put_contents("dados/dadosgithub.txt", searchfull($word,$lenght,$i), FILE_APPEND);
				$i=$i+$lenght;
			}
			$resultados_a_mostrar = "Concluido<br><a href='dados/dadosgit.txt'>Link ficheiro txt com os resultados!</a>";
		}
		//radio button activado do sourceforgeall
		else if ($_POST['radiobt']=='sourceforgeall') {
			$word = '"http://sourceforge.net/projects/"site:sourceforge.net';  //palavra a pesquisar
			$i=0;
			file_put_contents("dados/dadossource.txt", "");
			while ($i <= 230) {
				file_put_contents("dados/dadossource.txt", searchfull($word,$lenght,$i), FILE_APPEND);
				$i=$i+$lenght;
			}
			$resultados_a_mostrar = "Concluido<br><a href='dados/dadossource.txt'>Link ficheiro txt com os resultados!</a>";
		}
		//radio button activado do launchpadall
		else if ($_POST['radiobt']=='launchpadall') {
			$word = '"http://launchpad.net/"site:launchpad.net';  //palavra a pesquisar
			$i=0;
			file_put_contents("dados/dadoslaunchpad.txt", "");
			while ($i <= 230) {
				file_put_contents("dados/dadoslaunchpad.txt", searchfull($word,$lenght,$i), FILE_APPEND);
				$i=$i+$lenght;
			}
			$resultados_a_mostrar = "Concluido<br><a href='dados/dadoslaunchpad.txt'>Link ficheiro txt com os resultados!</a>";
		}
		//radio button activado do bitbucketall
		else if ($_POST['radiobt']=='bitbucketall') {
			$word = '"http://bitbucket.org/"site:bitbucket.org';  //palavra a pesquisar
			$i=0;
			file_put_contents("dados/dadosbitbucket.txt", "");
			while ($i <= 230) {
				file_put_contents("dados/dadosbitbucket.txt", searchfull($word,$lenght,$i), FILE_APPEND);
				$i=$i+$lenght;
			}
			$resultados_a_mostrar = "Concluido<br><a href='dados/dadosbitbucket.txt'>Link ficheiro txt com os resultados!</a>";
		}
		//radio button activado do googleall
		else if ($_POST['radiobt']=='googleall') {
			$word = '"http://code.google.com/p/"site:code.google.com';  //palavra a pesquisar
			$i=0;
			file_put_contents("dados/dadosgoogle.txt", "");
			while ($i <= 230) {
				file_put_contents("dados/dadosgoogle.txt", searchfull($word,$lenght,$i), FILE_APPEND);
				$i=$i+$lenght;
			}
			$resultados_a_mostrar = "Concluido<br><a href='dados/dadosgoogle.txt'>Link ficheiro txt com os resultados!</a>";
		}
		else {
			$word = trim($_POST['word']); //palavra a pesquisar
			$resultados_a_mostrar = search($word,$lenght);
		}
	} else {
		$resultados_a_mostrar = "Insira palavra para pesquisar.";
	}
}
//#################################################################################################################################
//funcao para pesquisar
function search($word,$lenght,$offset=0) {
	//pagina do api
	$request ='http://api.search.live.net/json.aspx?Appid=83019BDA3590E9CC61CBB51C2385A72F93810B47&Query='.$word.'&Sources=Web&Web.Count='.$lenght.'&Web.Offset='.$offset.'';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$jsonobj = json_decode($response);
	//opcao de mostrar array ou nao
	if ($_POST['radiobt']=='array') {
		$resultados_a_mostrar = $jsonobj;
	}
	else {
		//total de pesquisas feitas
		$end = $jsonobj->SearchResponse->Web->Total;
		//mostra o total de pesquisas
		$resultados_a_mostrar = "<b>Total Resultados:</b> ".$end."<br><br>";
		//mostra os resultados no seguinte formato: titulo - url
		foreach($jsonobj->SearchResponse->Web->Results as $arg) {
			$resultados_a_mostrar .= "<b>Titulo:</b> ".$arg->Title." - <b>Url:</b> ".$arg->Url."<br>";
		}
		$resultados_a_mostrar .= "<br>";
		//link para retroceder nos resultados
		if ($offset != 0) {
			$resultados_a_mostrar .= '<a href=\'bing_teste.php?word='.$word.'&lenght='.$lenght.'&offset='.(($lenght-$offset)*(-1)).'\'>Less</a> | ';
		}
		//link para avancar nos resultados
		$resultados_a_mostrar .= '<a href=\'bing_teste.php?word='.$word.'&lenght='.$lenght.'&offset='.($lenght+$offset).'\'>More</a>';
	}
	//returna a string
	return $resultados_a_mostrar;
}
//funcao para pesquisar all
function searchfull($word,$lenght,$offset=0) {
	//pagina do api
	$request ='http://api.search.live.net/json.aspx?Appid=83019BDA3590E9CC61CBB51C2385A72F93810B47&Query='.$word.'&Sources=Web&Web.Count='.$lenght.'&Web.Offset='.$offset.'';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$jsonobj = json_decode($response);
	//total de pesquisas feitas
	$end = $jsonobj->SearchResponse->Web->Total;
	//mostra o total de pesquisas
	$resultados_a_mostrar = "";
	//mostra os resultados no seguinte formato: titulo - url
	foreach($jsonobj->SearchResponse->Web->Results as $arg) {
		$resultados_a_mostrar .= $arg->Title."|".$arg->Url."\n";
	}
	//returna a string
	return $resultados_a_mostrar;
}
//#################################################################################################################################
?>
<html>
<head>
<title></title>
</head>
<body>
	<h1><a href='bing_teste.php'>Bing API Search</a></h1>
	<hr><br>
	<div style="position: relative;clear: both;">
	<form name="form1" method="post" action="" align="center">
		<div style="position: relative;float: left;width: 40%; ">
			<b style="font-size:12px;">Pesquisar por:</b> <input name="word" type="text" id="word" value="php"><br><br>
			<b style="font-size:12px;">Quantas pesquisas a mostrar (0-50) (default: 10):</b> <input name="tamanho" type="text" id="tamanho" value="10"><br><br>
			<input type="submit" name="Submit" value="Pesquisar ...">
		</div>
		<div style="position: relative;float: right;width: 60%; ">
			<input type="radio" name="radiobt" value="github"> Github search</input><br><br>
			<input type="radio" name="radiobt" value="githuball"> Github search ALL - pode demorar algum tempo!</input><br><br>
			<input type="radio" name="radiobt" value="sourceforge"> Sourceforge search</input><br><br>
			<input type="radio" name="radiobt" value="sourceforgeall"> Sourceforge search ALL - pode demorar algum tempo!</input><br><br>
			<input type="radio" name="radiobt" value="launchpad"> Launchpad search</input><br><br>
			<input type="radio" name="radiobt" value="launchpadall"> Launchpad search ALL - pode demorar algum tempo!</input><br><br>
			<input type="radio" name="radiobt" value="bitbucket"> Bitbucket search</input><br><br>
			<input type="radio" name="radiobt" value="bitbucketall"> Bitbucket search ALL - pode demorar algum tempo!</input><br><br>
			<input type="radio" name="radiobt" value="google"> Google Code search</input><br><br>
			<input type="radio" name="radiobt" value="googleall"> Google search ALL - pode demorar algum tempo!</input><br><br>
			<input type="radio" name="radiobt" value="array"> Mostrar pesquisas num array</input><br><br>
		</div>
	</form>
	</div>
	<div style="position: relative;clear: both;">
		<br><hr><br>
	</div>
	<div>
		<?php echo "<pre>"; print_r($resultados_a_mostrar); echo "</pre>"; ?>
	</div>
	<br><br><br>
</body>
</html>