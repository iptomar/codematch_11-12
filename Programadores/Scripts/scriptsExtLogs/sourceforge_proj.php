<?php
include ("database_data.php");
include ("ext_languages.php");
include ("log_insertV2.php");

//calcular o tempo que demora o script
//$mtime = microtime(); 
//$mtime = explode(" ",$mtime); 
//$mtime = $mtime[1] + $mtime[0]; 
//$starttime = $mtime; 

$get_details = get_details('20');

foreach($get_details as $project => $owner) {
	$array_percentagem = array();
	$dirs_names=array();
	$total_ficheiros = 0;
	$page = curl("https://$project.svn.sourceforge.net/svnroot/$project/");
	preg_match_all('/<li><a href="(.*)">(.*)<\/a><\/li>/', $page, $matches);
	foreach($matches[1] as $file) {
		if (substr($file, -1) == "/"){ //dir	
			if ($file != "../") {
				$dirs_names[]=$file;
			}
		} else {
			$array_percentagem = compare($file, $array_percentagem, $array_languages);
			$total_ficheiros ++;
		}
	}
	while (true) {
		list($dirs_names_aux, $total_ficheiros_aux, $array_percentagem_aux) = getDirs($project, $dirs_names, $total_ficheiros, $array_percentagem, $array_languages);
		$array_percentagem = $array_percentagem_aux;
		$dirs_names = $dirs_names_aux;
		$total_ficheiros = $total_ficheiros_aux;
		if (empty($dirs_names)) break;
	}
	foreach($array_percentagem as $lang => $percent) {
		//verificar se C++ ja existe na key do array, se existe soma o valor da percentagem
		if(isset($array_final[$array_languages[$lang]])){
			$array_final[$array_languages[$lang]] += round(($percent/$total_ficheiros)*100,1);
		} else {
			$array_final[$array_languages[$lang]] = round(($percent/$total_ficheiros)*100,1);
		}
	}
	if (empty($array_final)) {	
		insert_log($project, json_encode(array("n/a")), $total_ficheiros);
	}
	else {
		arsort($array_final);
		insert_log($project, json_encode($array_final), $total_ficheiros);
	}
}
//calcular o tempo que demora o script
//$mtime = microtime(); 
//$mtime = explode(" ",$mtime); 
//$mtime = $mtime[1] + $mtime[0]; 
//$endtime = $mtime; 
//$totaltime = ($endtime - $starttime); 
//echo "Demorou ".$totaltime." segundos\r\n"; 





//funcao para ir buscar as directorias 
function getDirs($project, $dirs_names, $total_ficheiros, $array_percentagem, $array_languages) {
	$dirs_names_aux=array();
    $i=0;
	$lenght=count($dirs_names);
    while($i<$lenght){
		$page = curl("https://$project.svn.sourceforge.net/svnroot/$project/".$dirs_names[$i]);
		preg_match_all('/<li><a href="(.*)">(.*)<\/a><\/li>/', $page, $matches);
		foreach($matches[1] as $file) {
			if (substr($file, -1) == "/"){ //dir
				if ($file != "../") {
					$dirs_names_aux[]=$dirs_names[$i].$file;
				}
			} else {
				$array_percentagem = compare($file, $array_percentagem, $array_languages);
				$total_ficheiros ++;
			}
		}
		$i++;
	}
	return array($dirs_names_aux, $total_ficheiros, $array_percentagem);
}

//funcao para comparar as extensoes
function compare($files, $array_percentagem, $array_languages) {
	$extensao = substr($files, strrpos($files, '.'), strlen($files));
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
	return $array_percentagem;
}

function curl($url) {
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	return $page;
}
?>