<?php
include "APIS/launchpad.php"; //include da api launchpad
//include "db_insert.php"; //include dos metodos para inserir os dados


//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 1) {
	$yahoo_array = get_yahoo_launchpad(10, $i);
	foreach($yahoo_array as $exe) {
		list ($name_project, $title, $source, $owner, $language, $created_date, $logo) = $exe;
		if (isset($name_project)) {
			//insert_db($name_project, $title, $source, "Launchpad", $owner, $language, $created_date, $logo);
			print_r("<b>Project:</b> ".$name_project."<br>");
			print_r("<b>Title:</b> ".$title."<br>");
			print_r("<b>Source:</b> ".$source."<br>");
			print_r("<b>Repository:</b> Launchpad<br>");
			print_r("<b>Owner:</b> ".$owner[0]."<br>");
			foreach($language as $exe_lang) {
				print_r("<b>Languages:</b> ".$exe_lang."<br>");
			}
			print_r("<b>Date Created:</b> ".$created_date[0]."<br>");
			print_r("<b>Date Updated:</b> ".$created_date[1]."<br>");
			print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");;
	}
	$i=$i+1;
}
}


//###########################################################################################################

/*
Parametros:
	- n/a
 Retorna:
	- array() (retorna array com os dados do get_project_launchpad)
*/
function get_yahoo_launchpad($lenght, $offset) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, 'http://boss.yahooapis.com/ysearch/web/v1/http://launchpad.net/?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=json&sites=launchpad.net&start='.$offset.'&count='.$lenght.'');  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	//descodifica a pagina
	$yahoo_json = json_decode($page);
	$yahoo_array = array(); //cria o array
	foreach($yahoo_json->ysearchresponse->resultset_web as $projs) {
		//retira o nome do utilizador atraves do URL
		preg_match("/https:\/\/launchpad.net\/([A-Za-z0-9-_]*).*/", $projs->url, $match);
		if (!empty($match[1])) {
			//match[1] = utilizador
			array_push($yahoo_array, get_project_launchpad($match[1])); //adiciona os projectos ao array
		}
	}
	unset($yahoo_array[0]); //remove 1� posicao em branco
	return (array)$yahoo_array;
}



?>






