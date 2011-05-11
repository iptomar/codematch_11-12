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
function get_project_github($user, $project) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/repos/show/$user/$project");  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$github_json = json_decode($page); //descodifica string JSON
    echo '<pre>';
    print_r($github_json);
    echo '</pre>';
	if(isset($github_json->repository->name)){
		$string_name = $github_json->repository->name;
	} else {
		$string_name = null;
	}
	if(isset($github_json->repository->description)){
		$string_title = $github_json->repository->description;
	} else {
		$string_title = "n/a";
	}
	if(isset($github_json->repository->url)){
		$string_source = $github_json->repository->url;
	} else {
		$string_source = "n/a";
	}
	if(isset($github_json->repository->owner)){
		$string_owner = array();
		array_push($string_owner, $github_json->repository->owner);
	} else {
		$string_owner = array("n/a");
	}
	if(isset($github_json->repository->language)){
		$string_lang = array();
		$string_lang = preg_split('/,/', $github_json->repository->language, -1);
	} else {
		$string_lang = array("n/a");
	}
	//faz replace da Visual Basic por VB/VBS
	$string_lang=str_replace('Visual Basic', 'VB/VBS', $string_lang, $count);
	if(isset($github_json->repository->created_at)){
		$string_date = array();
		preg_match("/[0-9]*\\/[0-9]*\\/[0-9]*/", $github_json->repository->created_at, $match);
		array_push($string_date, preg_replace('/\\//', '', $match[0], -1));
		preg_match("/[0-9]*\\/[0-9]*\\/[0-9]*/", $github_json->repository->pushed_at, $match2);
		array_push($string_date, preg_replace('/\\//', '', $match2[0], -1));
	} else {
		$string_date = array("n/a");
	}	
	return array($string_name, $string_title, $string_source, $string_owner, $string_lang, $string_date, "n/a");	
}

function get_files_github($user, $repo) {

  $ch = @curl_init(); //inicia uma nova sessao
curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/commits/list/".$user."/".$repo."/master?page=1");  //faz a pesquisa contida no url
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
$page = curl_exec($ch);	//executa as opcoes definidas
curl_close($ch);	//encerra sessao
$github_json = json_decode($page); //descodifica string JSON
$github_tree_sha = $github_json->commits[0]->tree;

echo "<pre>";
print_r($github_tree_sha);
echo "</pre>";


$ch = @curl_init(); //inicia uma nova sessao
curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/blob/full/".$user."/".$repo."/$github_tree_sha");  //faz a pesquisa contida no url
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
$page = curl_exec($ch);	//executa as opcoes definidas
curl_close($ch);	//encerra sessao
$github_json = json_decode($page); //descodifica string JSON

echo "<pre>";
print_r($github_json);
echo "</pre>";


foreach($github_json->blobs as $ext){
$extensao = substr($ext->name, strrpos($ext->name, '.'), strlen($ext->name));
print_r($extensao);
$os = array(".rdoc" => "Documento", ".js" => "JavaScript", ".jar" => "Java", ".html" => "Páginas HTML");
//if (in_array($extensao, $os)) {
    if(isset($os[$extensao])) {
        echo '=> ';
        echo $os[$extensao];
        echo '<br />';
    }  else {echo '=> outros';
        echo '<br />';
    }
    }
//}
  }
?>