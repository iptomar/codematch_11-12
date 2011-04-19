<?php
include "APIS/github.php"; //include da api github
include "db_insert.php";

//o ciclo while e para ir mudando de pagina
$i=0;
while ($i <= 10) {
	//$argv[1] - argumento na linha de comandos
	$google_array = get_google_github();
	foreach($google_array as $arg) {
		list ($name_project, $title, $source, $owner, $language, $created_date, $logo) = $arg;
		if (isset($name_project)) {
			//insert_db($name_project, $title, $source, "Github", $owner, $language, $created_date, $logo);
			print_r("<b>Project:</b> ".$name_project."<br>");
			print_r("<b>Title:</b> ".$title."<br>");
			print_r("<b>Source:</b> ".$source."<br>");
			print_r("<b>Repository:</b> Github<br>");
			print_r("<b>Owner:</b> ".$owner[0]."<br>");
			foreach($language as $arg_lang) {
				print_r("<b>Languages:</b> ".$arg_lang."<br>");
			}
			print_r("<b>Date Created:</b> ".$created_date[0]."<br>");
			print_r("<b>Date Updated:</b> ".$created_date[1]."<br>");
			print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
		}
	}
	$i=$i+10;
}

// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_github)
function get_google_github() {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/customsearch/v1?key=AIzaSyC3tu4QLO-rePWJqTDb6CEBqxnHIAznUAE&amp&cx=009295779571442939711:jdbz_k5vgzk&q=*&alt=json');  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );    //Para pesquisas https
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$google_json = json_decode($page); //descodifica string JSON
	$google_array = array(); //cria o array
	foreach($google_json->items as $arg) {
		//retira o nome do projecto e utilizador atraves do URL
		preg_match("/https:\/\/github.com\/([A-Za-z0-9]*)\/([A-Za-z0-9-_]*).*/", $arg->link, $match);
		if (!empty($match[2])) {
			//match[1] = utilizador, match[2] =  nome projecto
			array_push($google_array, get_project_github($match[1],$match[2])); //adiciona os projectos ao array
		}
	}
	unset($google_array[0]); //remove 1� posicao em branco
	return (array)$google_array;
}
?>