<?php
// Parametros:
//	- $project (nome do projecto) 
// Retorna: 
//	- array() (retorna array com os seguintes dados:)
//		- nome projecto
//		- autores (array)
//		- data criado
function get_project_sourceforge($project) {
	//pagina do api
	$request = "http://sourceforge.net/api/project/name/$project/json";
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$sourceforge_json = json_decode($response);
	return array($sourceforge_json->Project->name, get_user_sourceforge($project), $sourceforge_json->Project->created, get_logo_sourceforge("http://sourceforge.net/projects/$project/"));	
}

// Parametros:
//	- $project (nome do projecto) 
// Retorna: 
//	- array() (retorna array com os seguintes dados:)
//		- autores
function get_user_sourceforge($project) {
	//pagina do api
	$request = "http://sourceforge.net/api/project/name/$project/json";
	//le o ficheiro para uma string
	$response = file_get_contents($request);
	//descodifica uma string json
	$sourceforge_json = json_decode($response);
	$users = array();
	foreach($sourceforge_json->Project->maintainers as $arg) {
		array_push($users, $arg->name);
	}
	return $users;
}

//nao esta a funcionar
function get_logo_sourceforge($url) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch,CURLOPT_URL, $url);  //faz a pesquisa contida no url
	curl_setopt($ch,CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	preg_match('/alt="(.*)" src="(.*)" height="48" width="48"\/>/', $page, $match); 
	if (empty($match[2])) {
		return 0;
	}
	else {
		return $match[2]; 
	}
}
?>