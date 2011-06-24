<?php
set_time_limit(0); 
include ("database_data.php");
include ("ext_languages.php");
include ("log_insertV2.php");

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime; 

$control_dir = false;
$dirs_names=array();
$total_ficheiros = 0;
$page = curl("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/");
preg_match_all('/<li><a href="(.*)">(.*)<\/a><\/li>/', $page, $matches);
foreach($matches[1] as $files) {
	if (substr($files, -1) == "/"){ //dir	
		if ($files != "../") {
			$dirs_names[]=$files;
		}
	} else {
		$total_ficheiros ++;
	}
}
while (true) {
	list($dirs_names_aux, $total_ficheiros_aux) = getDirs($dirs_names, $total_ficheiros);
	$dirs_names = $dirs_names_aux;
	$total_ficheiros = $total_ficheiros_aux;
	if (empty($dirs_names)) break;
}


function getDirs($dirs_names, $total_ficheiros) {
	$dirs_names_aux=array();
    $i=0;
	$lenght=count($dirs_names);
    while($i<$lenght){
		$page = curl("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dirs_names[$i]);
		preg_match_all('/<li><a href="(.*)">(.*)<\/a><\/li>/', $page, $matches);
		foreach($matches[1] as $files2) {
			if (substr($files2, -1) == "/"){ //dir
				if ($files2 != "../") {
					$dirs_names_aux[]=$dirs_names[$i].$files2;
				}
			} else {
				$total_ficheiros ++;
			}
		}
		$i++;
	}
	return array($dirs_names_aux, $total_ficheiros);
}
echo "Total Ficheiros: ".$total_ficheiros."\r\n";
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime); 
echo "Demorou ".$totaltime." segundos\r\n"; 





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