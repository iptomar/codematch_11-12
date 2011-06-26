<?php
set_time_limit(0); 
include ("database_data.php");
include ("ext_languages.php");
include ("log_insertV2.php");

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;

$get_details = get_details('190000');

$control_dir = false;
$dirs_names=array();
$total_ficheiros = 0;
$files_names=array();
$array_percentagem = array();
$array_final=array();

foreach($get_details as $project => $owner){
   $page = curl("https://$project.svn.sourceforge.net/svnroot/$project/");
    preg_match_all('/<li><a href="(.*)">(.*)<\/a><\/li>/', $page, $matches);
    foreach($matches[1] as $files) {
	    if (substr($files, -1) == "/"){ //dir
		    if ($files != "../") {
			    $dirs_names[]=$files;
		    }
	    } else {
	        $files_names[]=$files;
		    $total_ficheiros ++;
	    }
    }
    while (true) {
	    list($dirs_names_aux, $files_names_aux, $total_ficheiros_aux) = getDirs($project, $dirs_names, $total_ficheiros);
	    $dirs_names = $dirs_names_aux;
        $lgt=count($files_names_aux);
        $j=0;
        while($j<$lgt){
            $files_names[]=$files_names_aux[$j];
            $j++;
        }
	    $total_ficheiros = $total_ficheiros_aux;
	    if (empty($dirs_names)) break;
    }



    $lt=count($files_names);
    $w=0;
    while($w<$lt){
        $ext = substr($files_names[$w], strrpos($files_names[$w], '.'), strlen($files_names[$w]));
			if(isset($array_languages[$ext])) {
				if(isset($array_percentagem[$ext])){
					$array_percentagem[$ext]++;
				} else {
					$array_percentagem[$ext] = 1;
				}
			}
			else {
				if(isset($array_percentagem['Others'])){
					$array_percentagem['Others']++;
				} else {
					$array_percentagem['Others'] = 1;
				}
			}
            $w++;
    }

    foreach($array_percentagem as $lang => $percent) {
		//verificar se C++ ja existe na key do array, se existe soma o valor da percentagem
		if(isset($array_final[$array_languages[$lang]])){
			$array_final[$array_languages[$lang]] += round(($percent/$total_ficheiros)*100,1);
		} else {
			$array_final[$array_languages[$lang]] = round(($percent/$total_ficheiros)*100,1);
		}
	}
//if (!empty($array_final)) {
//		arsort($array_final);
//		insert_log($project, json_encode($array_final), $total_ficheiros);
//	}
print_r($project);
echo"<br />";
echo"<pre>";
print_r($array_final);
echo"</pre>";
echo"<br />";
echo"<br />";
echo"<br />";
echo"<br />";
}


echo "Total Ficheiros: ".$total_ficheiros."\r\n";
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "Demorou ".$totaltime." segundos\r\n";




function getDirs($project, $dirs_names, $total_ficheiros) {
	$dirs_names_aux=array();
    $files_names_aux=array();
    $i=0;
	$lenght=count($dirs_names);
    while($i<$lenght){
		$page = curl("https://$project.svn.sourceforge.net/svnroot/$project/".$dirs_names[$i]);
		preg_match_all('/<li><a href="(.*)">(.*)<\/a><\/li>/', $page, $matches);
		foreach($matches[1] as $files2) {
			if (substr($files2, -1) == "/"){ //dir
				if ($files2 != "../") {
					$dirs_names_aux[]=$dirs_names[$i].$files2;
				}
			} else {
                $files_names_aux[]=$files2;
				$total_ficheiros ++;
			}
		}
		$i++;
	}
	return array($dirs_names_aux, $files_names_aux, $total_ficheiros);
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