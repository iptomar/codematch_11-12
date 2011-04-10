<?php
include "launchpad.php"; //include da api launchpad
include "github.php"; //include da api github
include "sourceforge.php"; //include da api sourceforge


$google_array = get_google_launchpad();
foreach($google_array as $arg) {
	list ($name_project, $owner, $language, $created_date, $logo) = $arg;
	print_r("<b>Project:</b> ".$name_project."<br>");
	print_r("<b>Source:</b> Launchpad<br>");
	print_r("<b>Owner:</b> ".$owner."<br>");
	print_r("<b>Languages:</b> ".$language."<br>");
	print_r("<b>Date Created:</b> ".$created_date."<br>");
	print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
}

$google_array = get_google_github();
foreach($google_array as $arg) {
	list ($name_project, $repository, $owner, $language, $created_date) = $arg;
	print_r("<b>Project:</b> ".$name_project."<br>");
	print_r("<b>Source:</b> Github<br>");
	print_r("<b>Repository:</b> ".$repository."<br>");
	print_r("<b>Owner:</b> ".$owner."<br>");
	print_r("<b>Languages:</b> ".$language."<br>");
	print_r("<b>Date Created:</b> ".$created_date."<br><hr><br>");
}

$google_array = get_google_sourceforge();
foreach($google_array as $arg) {
	list ($name_project, $owner, $created_date, $logo) = $arg;
	print_r("<b>Project:</b> ".$name_project."<br>");
	print_r("<b>Source:</b> Sourceforge<br>");
	foreach($arg[1] as $arg_owner) {
		print_r("<b>Owner:</b> ".$arg_owner."<br>");
	}
	print_r("<b>Date Created:</b> ".$created_date."<br>");
	print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
}

//###########################################################################################################

// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_launchpad)
function get_google_launchpad() {
	//pagina do api
	$request ='https://www.googleapis.com/customsearch/v1?key=AIzaSyC3tu4QLO-rePWJqTDb6CEBqxnHIAznUAE&amp&cx=009295779571442939711:e1rt6g-p970&q=*&alt=json';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$google_json = json_decode($response);
	$google_array = array(); //cria o array
	foreach($google_json->items as $arg) {
		//retira o nome do utilizador atraves do URL
		preg_match("/https:\/\/launchpad.net\/([A-Za-z0-9-_]*).*/", $arg->link, $match);
		if (!empty($match[1])) {
			//match[1] = utilizador
			array_push($google_array, get_project_launchpad($match[1])); //adiciona os projectos ao array
		}
	}
	unset($google_array[0]); //remove 1º posicao em branco
	return (array)$google_array;
}

// Parametros:
//	- n/a
// Retorna: 
//	- array() (retorna array com os dados do get_project_github)
function get_google_github() {
	//pagina do api
	$request ='https://www.googleapis.com/customsearch/v1?key=AIzaSyC3tu4QLO-rePWJqTDb6CEBqxnHIAznUAE&amp&cx=009295779571442939711:jdbz_k5vgzk&q=*&alt=json';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$google_json = json_decode($response);
	$google_array = array(); //cria o array
	foreach($google_json->items as $arg) {
		//retira o nome do projecto e utilizador atraves do URL
		preg_match("/https:\/\/github.com\/([A-Za-z0-9]*)\/([A-Za-z0-9-_]*).*/", $arg->link, $match);
		if (!empty($match[2])) {
			//match[1] = utilizador, match[2] =  nome projecto
			array_push($google_array, get_project_github($match[1],$match[2])); //adiciona os projectos ao array
		}
	}
	unset($google_array[0]); //remove 1º posicao em branco
	return (array)$google_array;
}

// Parametros:
//	- n/a
// Retorna: 
//	- array( posicao 1 outro array() ) (retorna array com os dados do get_project_sourceforge)
function get_google_sourceforge() {
	//pagina do api
	$request ='https://www.googleapis.com/customsearch/v1?key=AIzaSyC3tu4QLO-rePWJqTDb6CEBqxnHIAznUAE&amp&cx=009295779571442939711:7xtebgwnjiw&q=*&alt=json';
	//recebe as pagina
	$response = file_get_contents($request);
	//descodifica a pagina
	$google_json = json_decode($response);
	$google_array = array(); //cria o array
	foreach($google_json->items as $arg) {
		//retira o nome do utilizador atraves do URL
		preg_match("/http:\/\/sourceforge.net\/projects\/([A-Za-z0-9-_]*).*/", $arg->link, $match);
		if (!empty($match[1])) {
			//match[1] = utilizador
			array_push($google_array, get_project_sourceforge($match[1])); //adiciona os projectos ao array
		}
	}
	unset($google_array[0]); //remove 1º posicao em branco
	return (array)$google_array;
}
?>