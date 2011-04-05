<?php

/*
	Faz a pesquisa por projectos com a linguagem python com o google custom Search no bitbucket. 
	A key no url diz respeito à chave da API. cx diz respeito à chave da pesquisa personalizada
	que está na minha conta do google (Carma). Esta pesquisa permite fazer 100 queries/dia
*/
$url="https://www.googleapis.com/customsearch/v1?key=AIzaSyC3tu4QLO-rePWJqTDb6CEBqxnHIAznUAE&amp&cx=009295779571442939711:ewplraknkds&q=python&alt=json";

    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch,CURLOPT_URL,$url);  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    //Para pesquisas https
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$json = json_decode($page);////descodifica string JSON
	//print_r($page);
	//coloca os resultados na pagina
	print_r("</br>Pesquisa de projectos com a linguagem python.</br></br>Campos retornados pelo JSON com o <b>Custom Search</b> do google:");
	foreach($json->items as $item) {	
	print_r("<p><b>Title</b>: ".$item->title."</p><p><b>htmlTitle:</b>".$item->htmlTitle."</p><p><b>link:</b>");
	print_r($item->link."</p><p><b>snippet</b>: ".$item->snippet."</p><p><b>htmlSnippet</b>: ".$item->htmlSnippet);
	print_r("</br></br>-------------------------------------------------------------------------");
	}
?>

