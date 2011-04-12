<?php
include "launchpad.php"; //include da api launchpad
include "github.php"; //include da api github
include "sourceforge.php"; //include da api sourceforge

//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 2) {
	$yahoo_array = get_yahoo_launchpad(100, $i);
	foreach($yahoo_array as $arg) {
		list ($name_project, $owner, $language, $created_date, $logo) = $arg;
		print_r("<b>Project:</b> ".$name_project."<br>");
		print_r("<b>Source:</b> Launchpad<br>");
		print_r("<b>Owner:</b> ".$owner."<br>");
		print_r("<b>Languages:</b> ".$language."<br>");
		print_r("<b>Date Created:</b> ".$created_date."<br>");
		print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
	}
	$i++;
}


//###########################################################################################################

// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_launchpad)
function get_yahoo_launchpad($lenght, $offset) {
	//pagina do api
	$request ='http://boss.yahooapis.com/ysearch/web/v1/http://launchpad.net/?appid=po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-&format=json&sites=launchpad.net&start='.$offset.'&count='.$lenght.'';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$yahoo_json = json_decode($response);
	$yahoo_array = array(); //cria o array
	foreach($yahoo_json->{'ysearchresponse'}->{'resultset_web'} as $arg) {
		//retira o nome do utilizador atraves do URL
		preg_match("/https:\/\/launchpad.net\/([A-Za-z0-9-_]*).*/", $arg->{'url'}, $match);
		if (!empty($match[1])) {
			//match[1] = utilizador
			array_push($yahoo_array, get_project_launchpad($match[1])); //adiciona os projectos ao array
		}
	}
	unset($yahoo_array[0]); //remove 1º posicao em branco
	return (array)$yahoo_array;
}



?>






