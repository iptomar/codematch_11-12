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
	return array($github_json->repository->name, $github_json->repository->source, $github_json->repository->owner, $github_json->repository->language, $github_json->repository->created_at);	
}
?>