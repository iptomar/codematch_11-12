<?php
include ("database_data.php");
include ("ext_languages.php");
include ("log_insert.php");

$get_details = get_details('1');

foreach($get_details as $project => $owner) {
	$page = curl("http://bazaar.launchpad.net/~$owner/$project/trunk/files");
	preg_match_all('/<a href="(.*)" class="link">(.*)<\/a>/', $page, $matches);
	$total_ficheiros = 0;
	$i=0;
	$array_percentagem = array();
	$array_dirs = array();
	$array_final = array();
	foreach($matches[2] as $files) {
		if (stristr($matches[1][$i],'/files/')) {
			echo "Dir: $files<br>";
			array_push($array_dirs, $matches[1][$i]);
		}
		else if (stristr($matches[1][$i],'/view/')) {
			echo "Files: $files<br>";
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
		}
		$total_ficheiros++;
		$i++;
	}

	while (!empty($array_dirs)) {
		$i=0;
		foreach($array_dirs as $y => $dirs) {
			$page = curl("http://bazaar.launchpad.net".$dirs);
			preg_match_all('/<a href="(.*)" class="link">(.*)<\/a>/', $page, $matches);
			$i=0;
			unset($array_dirs[$y]);
			foreach($matches[2] as $files) {
				if (stristr($matches[1][$i],'/files/')) {
					echo "Dir: $files<br>";
					array_push($array_dirs, $matches[1][$i]);
				}
				else if (stristr($matches[1][$i],'/view/')) {
					echo "Files: $files<br>";		
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
				}
				$total_ficheiros++;
				$i++;
			}
		}
	}
	
}
foreach($array_percentagem as $lang => $percent) {
	//verificar se C++ ja existe na key do array, se existe soma o valor da percentagem
	if(isset($array_final[$array_languages[$lang]])){
		$array_final[$array_languages[$lang]] += round(($percent/$total_ficheiros)*100,1);
	} else {
		$array_final[$array_languages[$lang]] = round(($percent/$total_ficheiros)*100,1);
	}
}	
//foreach($get_details as $project => $owner) {
//	insert_log($project, $project, $array_final, $total_ficheiros);
//}



print_r("Done Launchpad Ext ".date("Y-m-d")."\n");


echo "<pre>";
print_r($array_dirs);
echo "</pre>";

echo "<pre>";
print_r($array_final);
echo "</pre>";

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