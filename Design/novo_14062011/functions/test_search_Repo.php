<?php
require_once('search_repo.php');

function dados_search_repo($repo){
//variável repositorio escolhido
$repo1 = $_GET['dat'];
$lista = search_repo($repo1);
$count = 0;
//array de resultados
 $arr = array();
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}
$repo = $_GET['dat'];
//$repo = "Github";
dados_search_repo($repo);
?>
