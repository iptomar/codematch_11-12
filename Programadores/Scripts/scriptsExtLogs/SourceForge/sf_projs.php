<?php
  $array = array();
  $total_files = 0;
  $i=0;
  $array=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/");
  $files_name=array();
  $dirs_names=array();
  $array2=array();
  $array3=array();
  $array4=array();
  $array5=array();
  $array6=array();
  $array7=array();
  $array8=array();
      foreach($array as $key => $name){
        //echo "<pre>";
//        print_r($array[$key]);
//        echo "</pre>";
        //echo "<br />";
//        echo "<br />";
        if ($array[$key]["type"] == "dir"){
            //echo "#############DIR###########.<br />";
            //print_r($array[$key]["name"]);
            $dir_name=$array[$key]["name"];
            $dirs_name[]=$dir_name;
            //echo "<br />";
//            print_r($dir_name);
//            echo "<br />";
//            echo "<br />";
            $array2=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name);
            //echo "#############Outro ARRAY###########.<br />";
            foreach($array2 as $key2 => $name2) {
                //echo "<pre>";
//                print_r($array2[$key2]);
//                echo "</pre>";
//                echo "<br />";
//                echo "<br />";
                if ($array2[$key2]["type"] == "dir"){
                    //echo "#############DIR2###########.<br />";
//                    print_r($array2[$key2]["name"]);
                    $dir_name2=$array2[$key2]["name"];
                    $dirs_name[]=$dir_name2;
                    //echo "<br />";
//                    print_r($dirs_name2);
//                    echo "<br />";
//                    echo "<br />";
//                    echo "<br />";
                    $array3=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name."/".$dir_name2);
                    //echo "#############Outro ARRAY###########.<br />";
                    foreach($array3 as $key3 => $name3) {
                        //echo "<pre>";
//                        print_r($array3[$key3]);
//                        echo "</pre>";
//                        echo "<br />";
//                        echo "<br />";
                        if ($array3[$key3]["type"] == "dir"){
                            //echo "#############DIR3###########.<br />";
//                            print_r($array3[$key3]["name"]);
                            $dir_name3=$array3[$key3]["name"];
                            $dirs_name[]=$dir_name3;
                            //echo "<br />";
//                            print_r($dir_name3);
//                            echo "<br />";
//                            echo "<br />";
//                            echo "<br />";
                            $array4=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name."/".$dir_name2."/".$dir_name3);
                            //echo "#############Outro ARRAY###########.<br />";
                            foreach($array4 as $key4 => $name4) {
                                //echo "<pre>";
//                                print_r($array4[$key4]);
//                                echo "</pre>";
//                                echo "<br />";
//                                echo "<br />";
                                if ($array4[$key4]["type"] == "dir"){
                                    //echo "#############DIR4###########.<br />";
//                                    print_r($array4[$key4]["name"]);
                                    $dir_name4=$array4[$key4]["name"];
                                    $dirs_name[]=$dir_name4;
                                    //echo "<br />";
//                                    print_r($dir_name4);
//                                    echo "<br />";
//                                    echo "<br />";
//                                    echo "<br />";
//                                    $array5=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name."/".$dir_name2."/".$dir_name3."/".$dir_name4);
//                                    //echo "#############Outro ARRAY###########.<br />";
//                                    foreach($array5 as $key5 => $name5) {
//                                        //echo "<pre>";
////                                        print_r($array5[$key5]);
////                                        echo "</pre>";
////                                        echo "<br />";
////                                        echo "<br />";
//                                        if ($array5[$key5]["type"] == "dir"){
//                                            //echo "#############DIR4###########.<br />";
////                                            print_r($array5[$key5]["name"]);
//                                            $dir_name5=$array5[$key5]["name"];
//                                            $dirs_name[]=$dir_name5;
//                                            //echo "<br />";
////                                            print_r($dir_name5);
////                                            echo "<br />";
////                                            echo "<br />";
////                                            echo "<br />";
//                                           // $array6=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name."/".$dir_name2."/".$dir_name3."/".$dir_name4."/".$dir_name5);
////                                            //echo "#############Outro ARRAY###########.<br />";
////                                            foreach($array6 as $key6 => $name6) {
////                                                //echo "<pre>";
//////                                                print_r($array6[$key6]);
//////                                                echo "</pre>";
//////                                                echo "<br />";
//////                                                echo "<br />";
////                                                if ($array6[$key6]["type"] == "dir"){
////                                                    //echo "#############DIR6###########.<br />";
//////                                                    print_r($array6[$key6]["name"]);
////                                                    $dir_name6=$array6[$key6]["name"];
////                                                    $dirs_name[]=$dir_name6;
////                                                    //echo "<br />";
//////                                                    print_r($dir_name6);
//////                                                    echo "<br />";
//////                                                    echo "<br />";
//////                                                    echo "<br />";
////                                                    $array7=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name."/".$dir_name2."/".$dir_name3."/".$dir_name4."/".$dir_name5."/".$dir_name6);
////                                                    //echo "#############Outro ARRAY###########.<br />";
////                                                    foreach($array7 as $key7 => $name7) {
////                                                        //echo "<pre>";
//////                                                        print_r($array7[$key7]);
//////                                                        echo "</pre>";
//////                                                        echo "<br />";
//////                                                        echo "<br />";
////                                                        if ($array7[$key7]["type"] == "dir"){
////                                                            //echo "#############DIR7###########.<br />";
////                                                            //print_r($array7[$key7]["name"]);
////                                                            $dir_name7=$array7[$key7]["name"];
////                                                            $dirs_name[]=$dir_name7;
////                                                            //echo "<br />";
//////                                                            print_r($dir_name7);
//////                                                            echo "<br />";
//////                                                            echo "<br />";
//////                                                            echo "<br />";
////                                                            //$array8=svn_ls("https://toohardforyou.svn.sourceforge.net/svnroot/toohardforyou/".$dir_name."/".$dir_name2."/".$dir_name3."/".$dir_name4."/".$dir_name5."/".$dir_name6."/".$dir_name7);
//////                                                            //echo "#############Outro ARRAY###########.<br />";
//////                                                            foreach($array8 as $key8 => $name8) {
//////                                                                //echo "<pre>";
////////                                                                print_r($array8[$key8]);
////////                                                                echo "</pre>";
////////                                                                echo "<br />";
////////                                                                echo "<br />";
//////                                                                if ($array8[$key8]["type"] == "dir"){
//////                                                                    //echo "#############DIR8###########.<br />";
////////                                                                    print_r($array8[$key8]["name"]);
//////                                                                    $dir_name8=$array8[$key8]["name"];
//////                                                                    $dirs_name[]=$dir_name8;
//////                                                                    //echo "<br />";
////////                                                                    print_r($dir_name8);
////////                                                                    echo "<br />";
////////                                                                    echo "<br />";
//////
//////                                                                } else {
//////                                                                    //echo "#############FILE8###########.<br />";
////////                                                                    print_r($array8[$key8]["name"]);
//////                                                                    $total_files++;
//////                                                                    $files_name[]=$array8[$key8]["name"];
//////                                                                    //echo "<br />";
//////                                                                }
//////                                                            }
////                                                        } else {
////                                                            //echo "#############FILE7###########.<br />";
//////                                                            print_r($array7[$key7]["name"]);
////                                                            $total_files++;
////                                                            $files_name[]=$array7[$key7]["name"];
////                                                            //echo "<br />";
////                                                        }
////                                                    }
////                                                } else {
////                                                    //echo "#############FILE6###########.<br />";
//////                                                    print_r($array6[$key6]["name"]);
////                                                    $total_files++;
////                                                    $files_name[]=$array6[$key6]["name"];
////                                                    //echo "<br />";
////                                                }
////                                            }
//                                        } else {
//                                            //echo "#############FILE5###########.<br />";
////                                            print_r($array5[$key5]["name"]);
//                                            $total_files++;
//                                            $files_name[]=$array5[$key5]["name"];
//                                            //echo "<br />";
//                                        }
//                                    }
                                } else {
                                    //echo "#############FILE4###########.<br />";
//                                    print_r($array4[$key4]["name"]);
                                    $total_files++;
                                    $files_name[]=$array4[$key4]["name"];
                                    //echo "<br />";
                                }
                            }
                        } else {
                            //echo "#############FILE3###########.<br />";
//                            print_r($array3[$key3]["name"]);
                            $total_files++;
                            $files_name[]=$array3[$key3]["name"];
                            //echo "<br />";
                        }
                    }
                } else {
                    //echo "#############FILE2###########.<br />";
//                    print_r($array2[$key2]["name"]);
                    $total_files++;
                    $files_name[]=$array2[$key2]["name"];
                    //echo "<br />";
                }
          }

        } else {
            //echo "#############FILE###########.<br />";
//            print_r($array[$key]["name"]);
            $total_files++;
            $files_name[]=$array[$key]["name"];
            //echo "<br />";
        }
      }
     //       https://fudforum.svn.sourceforge.net/svnroot/fudforum/
     //  https://segs.svn.sourceforge.net/svnroot/segs/
     //https://superresolution.svn.sourceforge.net/svnroot/superresolution/
     //https://supermag.svn.sourceforge.net/svnroot/supermag/
    echo "<br />";
    print_r($total_files);
    echo "<br />";
    echo "<br />";
    echo"<pre>";
    print_r($files_name);
    echo"</pre>";
    echo "<br />";
    echo "finish";


?>