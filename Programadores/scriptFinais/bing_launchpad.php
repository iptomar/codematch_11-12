<?php
include "launchpad.php"; //include da api launchpad

//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 230) {
	$bing_array = get_bing_launchpad(10, $i);
	foreach($bing_array as $arg) {
		list ($name_project, $owner, $language, $created_date, $logo) = $arg;
		if (isset($name_project)) {
			print_r("<b>Project:</b> ".$name_project."<br>");
			print_r("<b>Source:</b> Launchpad<br>");
			print_r("<b>Owner:</b> ".$owner."<br>");
			foreach($arg[2] as $arg_lang) {
				print_r("<b>Languages:</b> ".$arg_lang."<br>");
			}
			print_r("<b>Date Created:</b> ".$created_date."<br>");
			print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
		}
	}
	$i=$i+10;
}


// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_launchpad)
function get_bing_launchpad($lenght, $offset) {
	//pagina do api
	$request ='http://api.search.live.net/json.aspx?Appid=83019BDA3590E9CC61CBB51C2385A72F93810B47&Query="http://launchpad.net/"site:launchpad.net&Sources=Web&Web.Count='.$lenght.'&Web.Offset='.$offset.'';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$bing_json = json_decode($response);
//	echo "<pre>";
//	print_r($bing_json);
//	echo "</pre>";
	$bing_array = array(); //cria o array
	foreach($bing_json->SearchResponse->Web->Results as $arg) {
		//retira o nome do utilizador atraves do URL
		preg_match("/https:\/\/launchpad.net\/([A-Za-z0-9-_~]*).*/", $arg->Url, $match);
		if (isset($match[1])) {
			//match[1] = utilizador
			array_push($bing_array, get_project_launchpad($match[1])); //adiciona os projectos ao array
		}
	}
	unset($bing_array[0]); //remove 1º posicao em branco
	return (array)$bing_array;
}
?>