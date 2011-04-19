<?php
// Parametros:
//	- $project (nome do projecto) 
// Retorna: 
//	- array() (retorna array com os seguintes dados:)
//		- nome projecto
//		- titulo
//		- link
//		- array (autor)
//		- array (linguaguem)
//		- array (data criado, ultimo update)
//		- logo
function get_project_launchpad($project) {
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.launchpad.net/1.0/$project");
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	$launchpad_json = json_decode($page);
	if(isset($launchpad_json->name)){
		$string_name = $launchpad_json->name;
	} else {
		$string_name = null;
	}
	if(isset($launchpad_json->title)){
		$string_title = $launchpad_json->title;
	} else {
		$string_title = "n/a";
	}
	if(isset($launchpad_json->web_link)){
		$string_source = $launchpad_json->web_link;
	} else {
		$string_source = "n/a";
	}
	if(isset($launchpad_json->owner_link)){
		//retira o nome do owner do url
		preg_match("/https:\/\/api.launchpad.net\/(.*)/", $launchpad_json->owner_link, $match);
		$match[1] = str_replace('1.0/~', '', $match[1], $count);
		$match[1] = str_replace('~', '', $match[1], $count);
		$string_owner = array();
		array_push($string_owner, $match[1]);
	} else {
		$string_owner = array("n/a");
	}
	if(isset($launchpad_json->programming_language)){
		$string_lang = array();
		$string_lang = preg_split('/,/', $launchpad_json->programming_language, -1);
	} else {
		$string_lang = array("n/a");
	}
	//faz replace da Visual Basic por VB/VBS
	$string_lang=str_replace('Visual Basic', 'VB/VBS', $string_lang, $count);
	if(isset($launchpad_json->date_created)){
		$string_date = array();
		preg_match("/(.*)T/", $launchpad_json->date_created, $match);
		array_push($string_date, preg_replace('/-/', '', $match[1], -1));
		array_push($string_date, "n/a");
	} else {
		$string_date = array("n/a");
	}	
	if(isset($launchpad_json->logo_link)){
		$string_logo = $launchpad_json->logo_link;
	} else {
		$string_logo = "n/a";
	}
	return array($string_name, $string_title, $string_source, $string_owner, $string_lang, $string_date, $string_logo);	
}
?>