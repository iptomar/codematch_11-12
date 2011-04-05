<?php
	echo"###############GITHUB##################";
	$query = 'php';
    //pagina do api+site:www.github.com
	$request ='http://boss.yahooapis.com/ysearch/web/v1/'.$query.'+sites:github.com?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=xml$&start=0&count=20';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$json = json_decode($response);
	//foreach($json as $arg) {
		//$resultados .= "<b>Titulo:</b> ".$arg->Title." - <b>Url:</b> ".$arg->Url."<br>";
	//}
	//$resultados .= "<br>";
	echo "<pre>";
	//mostra array
	print_r($json);
	echo "</pre>";
	echo "<br />";
	
	echo"###############SOURCEFORGE##################";
	$query = 'sourceforge.net+php';
    //pagina do api+site:www.github.com
	$request ='http://boss.yahooapis.com/ysearch/web/v1/'.$query.'?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=xml$&start=0&count=20';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$json = json_decode($response);
	//foreach($json as $arg) {
		//$resultados .= "<b>Titulo:</b> ".$arg->Title." - <b>Url:</b> ".$arg->Url."<br>";
	//}
	//$resultados .= "<br>";
	echo "<pre>";
	//mostra array
	print_r($json);
	echo "</pre>";
	echo "<br />";
	
	echo"###############BITBUCKET##################";
	$query = 'bitbucket.org+php';
    //pagina do api+site:www.github.com
	$request ='http://boss.yahooapis.com/ysearch/web/v1/'.$query.'?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=xml$&start=0&count=20';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$json = json_decode($response);
	//foreach($json as $arg) {
		//$resultados .= "<b>Titulo:</b> ".$arg->Title." - <b>Url:</b> ".$arg->Url."<br>";
	//}
	//$resultados .= "<br>";
	echo "<pre>";
	//mostra array
	print_r($json);
	echo "</pre>";
	echo "<br />";
	
	echo"###############LAUNCHPAD##################";
	$query = 'launchpad.net+php';
    //pagina do api+site:www.github.com
	$request ='http://boss.yahooapis.com/ysearch/web/v1/'.$query.'?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=xml$&start=0&count=20';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$json = json_decode($response);
	//foreach($json as $arg) {
		//$resultados .= "<b>Titulo:</b> ".$arg->Title." - <b>Url:</b> ".$arg->Url."<br>";
	//}
	//$resultados .= "<br>";
	echo "<pre>";
	//mostra array
	print_r($json);
	echo "</pre>";
	echo "<br />";
	
	echo"###############GOOGLE##################";
	$query = 'code.google.com+php';
    //pagina do api+site:www.github.com
	$request ='http://boss.yahooapis.com/ysearch/web/v1/'.$query.'?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=xml$&start=0&count=20';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$json = json_decode($response);
	//foreach($json as $arg) {
		//$resultados .= "<b>Titulo:</b> ".$arg->Title." - <b>Url:</b> ".$arg->Url."<br>";
	//}
	//$resultados .= "<br>";
	echo "<pre>";
	//mostra array
	print_r($json);
	echo "</pre>";
	echo "<br />";
	
?>