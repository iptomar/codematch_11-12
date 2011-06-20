<?php
require_once('get_repo.php');

function dados_get_repo($repo){
//variável linguagem escolhida
$repo1 = $_GET['dat'];
//$repo1 = "SourceForge";
$lista = info($repo1);
$count = 0;
//array de resultados
 $arr = array();
 foreach ($lista as $key => $value){
  $arr[$key]=$value;
  //$count++;
 }
 echo json_encode($arr);
}
$repo = $_GET['dat'];
//$repo = "SourceForge";
dados_get_repo($repo);
?>
