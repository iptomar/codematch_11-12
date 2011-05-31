<?php
// Parametros:
//	- $project (nome do projecto) 
// Retorna: 
//	- array() (retorna array com os seguintes dados:)
//		- nome projecto
//		- autores (array)
//		- data criado
function get_project_sourceforge($project) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, "http://sourceforge.net/api/project/name/$project/json");  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$sourceforge_json = json_decode($page); //descodifica string JSON
	if(isset($sourceforge_json->Project->shortdesc)){
		$string_name = $sourceforge_json->Project->shortdesc;
	} else {
		$string_name = null;
	}
	if(isset($sourceforge_json->Project->name)){
		$string_title = $sourceforge_json->Project->name;
	} else {
		$string_title = "n/a";
	}
	if(isset($sourceforge_json->Project->{'summary-page'})){
		$string_source = $sourceforge_json->Project->{'summary-page'};
	} else {
		$string_source = "n/a";
	}
	if(isset($sourceforge_json->Project->maintainers)){
		$string_owner = array();
		foreach($sourceforge_json->Project->maintainers as $arg) {
			array_push($string_owner, $arg->name);
		}
	} else {
		$string_owner = array("n/a");
	}
	if(isset($sourceforge_json->Project->{'programming-languages'})){
		$string_lang = array();
		foreach($sourceforge_json->Project->{'programming-languages'} as $arg) {
			array_push($string_lang, $arg);
		}
	} else {
		$string_lang = array("n/a");
	}
	//faz replace da Visual Basic por VB/VBS
	$string_lang=str_replace('Visual Basic', 'VB/VBS', $string_lang, $count);
	if(isset($sourceforge_json->Project->created)){
		$string_date = array();
		array_push($string_date, date("Ymd", strtotime($sourceforge_json->Project->created)));
		array_push($string_date, "n/a");
	} else {
		$string_date = array("n/a");
	}
	return array($string_name, $string_title, $string_source, $string_owner, $string_lang, $string_date, get_logo_sourceforge($project));	
}


// Parametros:
//	- $project (nome do projecto) 
// Retorna: 
//	- logo link
function get_logo_sourceforge($project) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch,CURLOPT_URL, "http://sourceforge.net/projects/$project/");  //faz a pesquisa contida no url
	curl_setopt($ch,CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$start = strpos($page, '<div id="project-icon" class="noneditable">');
	$end = strpos($page, 'height="48" width="48"/>');
	$resultado = substr($page, $start, ($end-$start));
	$resultado2 = substr($resultado, (strpos($resultado, 'src="'))+5 );
	$resultado = str_replace('"', '', $resultado2, $count);
	if (empty($resultado)) {
		return "n/a";
	}
	else {
		return $resultado; 
	}

//	preg_match('/alt="(.*)" src="(.*)" height="48" width="48"\/>/', $page, $match); 
//	if (empty($match[2])) {
//		return "n/a";
//	}
//	else {
//		return $match[2]; 
//	}
	
}
?>