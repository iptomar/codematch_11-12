<?php
include "APIS/github.php"; //include da api github
include "db_insert.php";

//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 230) {
	//$argv[1] - argumento na linha de comandos
	$bing_array = get_bing_github(10, $i);
	foreach($bing_array as $arg) {
		list ($name_project, $title, $source, $owner, $language, $created_date, $logo) = $arg;
		if (isset($name_project)) {
			insert_db($name_project, $title, $source, "Github", $owner, $language, $created_date, $logo);
//			print_r("<b>Project:</b> ".$name_project."<br>");
//			print_r("<b>Title:</b> ".$title."<br>");
//			print_r("<b>Source:</b> ".$source."<br>");
//			print_r("<b>Repository:</b> Github<br>");
//			print_r("<b>Owner:</b> ".$owner[0]."<br>");
//			foreach($language as $arg_lang) {
//				print_r("<b>Languages:</b> ".$arg_lang."<br>");
//			}
//			print_r("<b>Date Created:</b> ".$created_date[0]."<br>");
//			print_r("<b>Date Updated:</b> ".$created_date[1]."<br>");
//			print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
		}
	}
	$i=$i+10;
}
print_r("Done Bing Github ".date("Y-m-d")."\n");

// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_github)
function get_bing_github($lenght, $offset) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, 'http://api.search.live.net/json.aspx?Appid=83019BDA3590E9CC61CBB51C2385A72F93810B47&Query="http://github.com/"site:github.com&Sources=Web&Web.Count='.$lenght.'&Web.Offset='.$offset.'');  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$bing_json = json_decode($page); //descodifica string JSON
	$bing_array = array(); //cria o array
	foreach($bing_json->SearchResponse->Web->Results as $arg) {
		//retira o nome do projecto e utilizador atraves do URL
		preg_match("/https:\/\/github.com\/([A-Za-z0-9]*)\/([A-Za-z0-9-_~]*).*/", $arg->Url, $match);
		if ((isset($match[2])) && ($match[1]!="blog")) { //o nome do utilizador nao pode ser blog
			//match[1] = utilizador, match[2] =  nome projecto
			array_push($bing_array, get_project_github($match[1],$match[2])); //adiciona os projectos ao array
		}
	}
	unset($bing_array[0]); //remove 1� posicao em branco
	return (array)$bing_array;
}
?>