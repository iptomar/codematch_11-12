<?php
// Parametros:
//	- $project (nome do projecto) 
// Retorna: 
//	- array() (retorna array com os seguintes dados:)
//		- nome projecto
//		- autor 
//		- linguaguem
//		- data criado
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
	if(isset($launchpad_json->owner_link)){
		$string_owner = $launchpad_json->owner_link;
	} else {
		$string_owner = null;
	}
	if(isset($launchpad_json->programming_language)){
		$string_lang = $launchpad_json->programming_language;
	} else {
		$string_lang = null;
	}
	if(isset($launchpad_json->date_created)){
		$string_date = $launchpad_json->date_created;
	} else {
		$string_date = null;
	}	
	if(isset($launchpad_json->logo_link)){
		$string_logo = $launchpad_json->logo_link;
	} else {
		$string_logo = null;
	}	
	return array($string_name, $string_owner, preg_split('/,/', $string_lang, -1), $string_date, $string_logo);	
}
?>