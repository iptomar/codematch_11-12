<?php
require_once('search_project_detail.php');

function dados_search_prj_dtl($proj){
//variável linguagem escolhida
$proj1 = $_GET['dat'];
//$autr1 = trim($autr1);
$lista = search_project_detail($proj1);
//array de resultados
 $arr = array();
foreach ($lista as $key => $value){
  $arr[$key]=$value;
 }
 echo json_encode($arr);
}
$prj = $_GET['dat'];
//$repo = "Github";
dados_search_prj_dtl($prj);
?>
