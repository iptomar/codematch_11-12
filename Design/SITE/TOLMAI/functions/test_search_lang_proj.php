<?php
require_once('search_lang_proj.php');

function dados_search_lang_proj($lang){
//variável linguagem escolhida
$lang1 = $_GET['dat'];
$lang1 = trim($lang1);
$lista = search_lang_proj($lang1);
$count = 0;
//array de resultados
 $arr = array();
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}
$lang = $_GET['dat'];
//$repo = "Github";
dados_search_lang_proj($lang);
?>
