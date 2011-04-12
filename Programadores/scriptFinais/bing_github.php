<?php
include "github.php"; //include da api github

//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 230) {
	$bing_array = get_bing_github(10, $i);
	foreach($bing_array as $arg) {
		list ($name_project, $repository, $owner, $language, $created_date) = $arg;
		print_r("<b>Project:</b> ".$name_project."<br>");
		print_r("<b>Source:</b> Github<br>");
		print_r("<b>Repository:</b> ".$repository."<br>");
		print_r("<b>Owner:</b> ".$owner."<br>");
		print_r("<b>Languages:</b> ".$language."<br>");
		print_r("<b>Date Created:</b> ".$created_date."<br><hr><br>");
	}
	$i=$i+10;
}

// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_github)
function get_bing_github($lenght, $offset) {
	//pagina do api
	$request ='http://api.search.live.net/json.aspx?Appid=83019BDA3590E9CC61CBB51C2385A72F93810B47&Query="http://github.com/"site:github.com&Sources=Web&Web.Count='.$lenght.'&Web.Offset='.$offset.'';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$bing_json = json_decode($response);
	$bing_array = array(); //cria o array
	foreach($bing_json->SearchResponse->Web->Results as $arg) {
		//retira o nome do projecto e utilizador atraves do URL
		preg_match("/https:\/\/github.com\/([A-Za-z0-9]*)\/([A-Za-z0-9-_]*).*/", $arg->Url, $match);
		if ((isset($match[2])) && ($match[1]!="blog")) { //o nome do utilizador nao pode ser blog
			//match[1] = utilizador, match[2] =  nome projecto
			array_push($bing_array, get_project_github($match[1],$match[2])); //adiciona os projectos ao array
		}
	}
	unset($bing_array[0]); //remove 1º posicao em branco
	return (array)$bing_array;
}
?>