<?php
  //include ("database_data.php");
//  include ("ext_languages.php");
//  include ("log_insertV2.php");

  //$get_details = get_details('190000');

  $array = array();
  $total_files = 0;
  $i=0;
  $array=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/");
  $link_dirs=array();
  $files_name=array();
  $dirs_names=array();
  $array_aux=array();
  $array_percentagem = array();
  $array_final = array();
      foreach($array as $key => $name){
        if ($array[$key]["type"] == "dir"){
            $dir_name=$array[$key]["name"];
            $link_dirs[]="/".$dir_name;
            }else{
            $total_files++;
            $files_name[]=$array[$key]["name"];
        }
        }
      while (!empty($link_dirs)){
               if(isset($link_dirs[0])){
                    $array_aux=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$link_dirs[0]);
                    foreach($array_aux as $key2 => $name2){
                        if ($array_aux[$key2]["type"] == "dir"){
                            $dir_name2=$array_aux[$key2]["name"];
                            $link_dirs[]=$link_dirs[0]."/".$dir_name2;
                        }else{
                            $total_files++;
                            $files_name[]=$array_aux[$key2]["name"];
                        }
                    }
                    unset($link_dirs[0]);
                }
               }
     //       https://sigeplus.svn.sourceforge.net/svnroot/sigeplus/ https://fudforum.svn.sourceforge.net/svnroot/fudforum/
     //   https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/
     //  https://segs.svn.sourceforge.net/svnroot/segs/
     //https://superresolution.svn.sourceforge.net/svnroot/superresolution/
     //https://supermag.svn.sourceforge.net/svnroot/supermag/

//    $lenght=count($files_name);
//    while($i<=$lenght){
//      $ext = substr($files_name[$i],strrpos($files_name[$i]),strlen($files_name[$i]));
//      if(isset($array_languages[$ext])) {
//				if(isset($array_percentagem[$ext])){
//					$array_percentagem[$ext]++;
//				} else {
//					$array_percentagem[$ext] = 1;
//				}
//			}
//			else {
//				if(isset($array_percentagem['Others'])){
//					$array_percentagem['Others']++;
//				} else {
//					$array_percentagem['Others'] = 1;
//				}
//			}
//      $i++
//    }
    
    echo "<br />";
    print_r($total_files);
    echo "<br />";
    echo "<br />";
    echo"<pre>";
    print_r($files_name);
    echo"</pre>";
    echo "<br />";
    echo "<br />";
    echo"<pre>";
    print_r($link_dirs);
    echo"</pre>";
//    echo "<br />";
//    echo "<br />";
//    echo"<pre>";
//    print_r($array_percentagem);
//    echo"</pre>";
    echo "finish";


?>