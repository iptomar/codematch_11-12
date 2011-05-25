<?php
include ("database_data.php");
include ("ext_languages.php");
include ("log_insert.php");

$get_details = get_details('190000');

foreach($get_details as $project => $owner) {
	$owner = substr($owner, 0, stripos($owner, ';'));
	list($array_percentagem, $total_ficheiros) = get_pling($project, $owner, $array_languages);
	if (isset($array_percentagem)) {	
		arsort($array_percentagem);
	}
	$insert_array_lang = array();
	$insert_array_plang = array();
	$i = 1;
	if (isset($array_percentagem)) {	
		foreach($array_percentagem as $lang => $percent) {
			if ($i <= 4) {
				array_push($insert_array_lang, $lang);
				array_push($insert_array_plang, $percent);
			}
			$i++;
		}
		insert_log($project, $project, $insert_array_lang, $insert_array_plang, $total_ficheiros);
//		echo $project." | ".$owner." | " .$total_ficheiros."<br>";	
//		echo "<pre>";
//		print_r($insert_array_lang);
//		echo "</pre>";
//		echo "<pre>";
//		print_r($insert_array_plang);
//		echo "</pre>";
//		echo "<hr>";	
	}	
}
print_r("Done Github Ext ".date("Y-m-d")."\n");

function get_pling($project, $owner, $array_languages) {
	//script para ir buscar a tree sha
	$ch = @curl_init(); //inicia uma nova sessao
	curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/commits/list/$owner/$project/master?page=1");  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
	$page = curl_exec($ch);	//executa as opcoes definidas
	curl_close($ch);	//encerra sessao
	$github_json = json_decode($page); //descodifica string JSON
	
	//verificar se é projecto github, se nao for da erro e nao e executado
	if (key($github_json) != 'error') {
		$github_tree_sha = $github_json->commits[0]->tree;
		//script para ir buscar os ficheiros
		$ch = @curl_init(); //inicia uma nova sessao
		curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/blob/full/$owner/$project/$github_tree_sha");  //faz a pesquisa contida no url
		curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
		$page = curl_exec($ch);	//executa as opcoes definidas
		curl_close($ch);	//encerra sessao
		$github_json = json_decode($page); //descodifica string JSON
		$total_ficheiros = count($github_json->blobs);

	//	echo "<pre>";
	//	print_r($github_json);
	//	echo "</pre>";

		$array_percentagem = array();
		foreach($github_json->blobs as $ext){	
			$extensao = substr($ext->name, strrpos($ext->name, '.'), strlen($ext->name));
			if(isset($array_languages[$extensao])) {	
				if(isset($array_percentagem[$extensao])){
					$array_percentagem[$extensao]++;
				} else {
					$array_percentagem[$extensao] = 1;
				}
			}
			else {
				if(isset($array_percentagem['Others'])){
					$array_percentagem['Others']++;
				} else {
					$array_percentagem['Others'] = 1;
				}
			}

		}	
		$array_final = array();
		foreach($array_percentagem as $lang => $percent) {
			//verificar se C++ ja existe na key do array, se existe soma o valor da percentagem
			if(isset($array_final[$array_languages[$lang]])){
				$array_final[$array_languages[$lang]] += round(($percent/$total_ficheiros)*100,1);
			} else {
				$array_final[$array_languages[$lang]] = round(($percent/$total_ficheiros)*100,1);
			}
		}
		return array($array_final, $total_ficheiros);
	}
	else {
		return null;
	}
}



?>