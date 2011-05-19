<?php

require ("database_data.php");
$tarray=get_details(10000);
//$auths=array();
//$i=0;
//while($i <= 10000){
//   $auths=key($tarray);
//   next($tarray);
//   $auths2=key($tarray);
//   i++;
//}
// foreach($tarray->$auths as $test){
      //print_r('<pre>');
//      Print_r($tarray->$auths);
//      print_r('</pre>');

//}
print_r('<pre>');
Print_r($tarray);
print_r('</pre>');
//script para ir buscar a tree sha
$ch = @curl_init(); //inicia uma nova sessao
curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/commits/list/madrobby/zepto/master?page=1");  //faz a pesquisa contida no url
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
$page = curl_exec($ch);	//executa as opcoes definidas
curl_close($ch);	//encerra sessao
$github_json = json_decode($page); //descodifica string JSON
$github_tree_sha = $github_json->commits[0]->tree;

//script para ir buscar os ficheiros
$ch = @curl_init(); //inicia uma nova sessao
curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/blob/full/madrobby/zepto/$github_tree_sha");  //faz a pesquisa contida no url
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
$page = curl_exec($ch);	//executa as opcoes definidas
curl_close($ch);	//encerra sessao
$github_json = json_decode($page); //descodifica string JSON
$total_ficheiros = count($github_json->blobs);

//echo "<pre>";
//print_r($github_json);
//echo "</pre>";

$array_ling = array(".rdoc" => "Documento", ".js" => "JavaScript", ".jar" => "Java", ".html" => "Páginas HTML");
$array_percentagem = array();
$i=0;
foreach($github_json->blobs as $ext){	
	$extensao = substr($ext->name, strrpos($ext->name, '.'), strlen($ext->name));
	if(isset($array_ling[$extensao])) {	
		if(isset($array_percentagem[$extensao])){
			$array_percentagem[$extensao]++;
		} else {
			$array_percentagem[$extensao] = 1;
		}
	}
}

//echo "<pre>";
//print_r($array_percentagem);
//echo "</pre>";


//foreach($array_percentagem as $percent) {
//	echo round( ($percent/$total_ficheiros)*100, 1 ). "<br>";
//}


?>