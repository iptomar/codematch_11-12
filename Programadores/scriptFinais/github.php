<?php
// Parametros:
//	- $user (utilizador)
//	- $project (nome do projecto) 
// Retorna: 
//	- array() (retorna array com os seguintes dados:)
//		- nome projecto
//		- autor 
//		- linguaguem
//		- data criado
function get_project_github($user, $project) {
	//pagina do api
	$request = "http://github.com/api/v2/json/repos/show/$user/$project";
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$github_json = json_decode($response);
	if(isset($github_json->repository->name)){
		$string_name = $github_json->repository->name;
	} else {
		$string_name = null;
	}
	if(isset($github_json->repository->source)){
		$string_source = $github_json->repository->source;
	} else {
		$string_source = null;
	}
	if(isset($github_json->repository->owner)){
		$string_owner = $github_json->repository->owner;
	} else {
		$string_owner = null;
	}
	if(isset($github_json->repository->language)){
		$string_lang = $github_json->repository->language;
	} else {
		$string_lang = null;
	}
	if(isset($github_json->repository->created_at)){
		$string_date = $github_json->repository->created_at;
	} else {
		$string_date = null;
	}		
	return array($string_name, $string_source, $string_owner, preg_split('/,/', $string_lang, -1), $string_date);	
}
?>