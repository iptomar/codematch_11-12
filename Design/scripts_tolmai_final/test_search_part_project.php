<?php
require_once('search_part_project.php');
$proj = $_GET['dat'];
function dados_search_part_prj($proj){
//variável linguagem escolhida

$proj = trim($proj);
$lista = search_part_proj($proj);
$count = 0;
//array de resultados
 
  $arr = array();
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}
//$autr = $_GET['dat'];

dados_search_part_prj($proj);
?>