<?php
require_once('search_part_author.php');

function dados_search_part_autr($autr){
//variável linguagem escolhida
$autr1 = $_GET['dat'];
//$autr1 = trim($autr1);
$lista = search_part_author($autr1);
$count = 0;
//array de resultados
 $arr = array();
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}
$autr = $_GET['dat'];
//$repo = "Github";
//$autr="X";
dados_search_part_autr($autr);
?>
