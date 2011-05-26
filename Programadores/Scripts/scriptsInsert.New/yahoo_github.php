<?php
include "APIS/github.php"; //include da api github
include "insert_DB.php";

//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 1000) {
	$yahoo_array = get_yahoo_github(50, $i);
    foreach($yahoo_array as $arg) {
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
	$i=$i+50;
}
print_r("Done Yahoo Github ".date("Y-m-d")."\n");


// Parametros:
//	- n/a
// Retorna:
//	- array() (retorna array com os dados do get_project_github)
function get_yahoo_github($lenght, $offset) {
	$thequery = urlencode('"http://github.com/*/*"site:github.com');
	$apikey = 'po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-';
	$url = 'http://boss.yahooapis.com/ysearch/web/v1/'.$thequery.'?&format=json&count='.$lenght.'&appid='.$apikey.'&start='.$offset.'';
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, $url);  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$yahoo_json = json_decode($page); //descodifica string JSON
	$yahoo_array = array(); //cria o array
	foreach($yahoo_json->ysearchresponse->resultset_web as $arg) {
		//retira o nome do projecto e utilizador atraves do URL
		preg_match("/github.com\/([A-Za-z0-9]*)\/([A-Za-z0-9-_~]*).*/", $arg->url, $match);
		if ((isset($match[2])) && ($match[1]!="blog")) { //o nome do utilizador nao pode ser blog
			//match[1] = utilizador, match[2] =  nome projecto
			array_push($yahoo_array, get_project_github($match[1], $match[2])); //adiciona os projectos ao array
		}
	}
	unset($yahoo_array[0]); //remove 1º posicao em branco
	return (array)$yahoo_array;
}
?>