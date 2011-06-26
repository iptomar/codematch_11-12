<?php
  include ("database_data.php");
  include ("ext_languages.php");
  include ("log_insertV2.php");

  $get_details = get_details('190000');
foreach($get_details as $project => $owner) {
   $array = array();
  $array2 = array();
  $exe_array=array();
  $total_files = 0;
  $i=0;
  $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, "http://sourceforge.net/api/project/name/$project/json");  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$sourceforge_json = json_decode($page); //descodifica string JSON
    if(isset($sourceforge_json->Project->SVNRepository->location)){
		$string_link = $sourceforge_json->Project->SVNRepository->location;
	}
    $matches = null;
    preg_match('/https:\\/\\/([A-Za-z0-9-_~]*).([A-Za-z0-9-_~]*).\\/*/', 'https://$project.svn.sourceforge.net/svnroot/$project/', $match);
    if ($match == "svn"){
      $array=svn_ls("https://".$project.".svn.sourceforge.net/svnroot/".$project."/");
  $link_dirs=array();
  $files_names=array();
  $dirs_names=array();
  $array_aux=array();
  $array_percentagem = array();
  $array_final = array();
  if (!empty($array)){
      foreach($array as $key => $name){
        if ($array[$key]["type"] == "dir"){
            $dir_name=$array[$key]["name"];
            $array2=svn_ls("https://".$project.".svn.sourceforge.net/svnroot/".$project."/".$dir_name);
            foreach($array2 as $key2 => $name2) {
                if ($array2[$key2]["type"] == "dir"){
                    $dir_name2=$array2[$key2]["name"];
                    $dirs_names[]=$dir_name."/".$dir_name2."/";
                } else {
                    $files_names[]=$array2[$key2]["name"];
                }
            }

        } else {
            $files_names[]=$array[$key]["name"];
        }
      }
      while (!empty($dirs_names)){
             extract(getFiles($dirs_names,$files_names,$project));
             $dirs_names = $da_aux;
             $test2 = count($fa_aux);
             $j=0;
             while($j<$test2){
                if(isset($fa_aux[$j])){
                   $files_names[] = $fa_aux[$j];
                }
                $j++;
             }
      }
  //#########Os links abaixo funcionam sem problemas#############
  //       https://sigeplus.svn.sourceforge.net/svnroot/sigeplus/
     //   https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/
     //https://superresolution.svn.sourceforge.net/svnroot/superresolution/
     //https://supermag.svn.sourceforge.net/svnroot/supermag/

    //#############Os links abaixo crasham o sistema#################
     //  https://segs.svn.sourceforge.net/svnroot/segs/
     // https://fudforum.svn.sourceforge.net/svnroot/fudforum/



    $total_files=count($files_names);
    $i=0;
    while($i<=$total_files){
      $ext = substr($files_name[$i],strrpos($files_name[$i],'.'),strlen($files_name[$i]));
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
      $i++;
}
}
    }

}
    echo "<br />";
    print_r($total_files);
    echo "<br />";
    echo "<br />";
//    echo"<pre>";
//    print_r($files_names);
//    echo"</pre>";
//    echo "<br />";
//    echo "<br />";
//    echo"<pre>";
//    print_r($dirs_names);
//    echo"</pre>";
    echo "<br />";
    echo "<br />";
    echo"<pre>";
    print_r($array_percentagem);
    echo"</pre>";
    echo "finish";
    echo "<br />";
function getFiles($dirs_names, $files_names, $project){
    $array_aux2 = array();
    $fa_aux=array();
    $fa_aux=$files_names;
    $da_aux=array();
    $lenght=count($dirs_names);
    $i=0;
    while($i<$lenght){
        if(isset($dirs_names[$i])){
        $array_aux2=svn_ls("https://".$project.".svn.sourceforge.net/svnroot/".$project."/".$dirs_names[$i]);
            foreach($array_aux2 as $key_aux => $name_aux) {
                if ($array_aux2[$key_aux]["type"] == "dir"){
                    $dir_name_aux=$array_aux2[$key_aux]["name"];
                    $da_aux[]=$dirs_names[$i].$dir_name_aux."/";
                } else {
                    $fa_aux[]=$array_aux2[$key_aux]["name"];
                }
            }
        }
        $i++;
    }
    return compact('da_aux','fa_aux');
  }

?>