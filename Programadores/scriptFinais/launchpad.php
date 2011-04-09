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
	return array($launchpad_json->display_name, $launchpad_json->owner_link, $launchpad_json->programming_language, $launchpad_json->date_created, $launchpad_json->logo_link);	
}
?>