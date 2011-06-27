<?php
require_once('search_lang_single_proj.php');
$proj = $_GET['dat'];
function dados_search_lang_s_proj($proj){
//variável linguagem escolhida

$proj = trim($proj);
$lista = search_auth_single_proj($proj);
$count = 0;
//array de resultados
 $arr = array();
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}

dados_search_lang_s_proj($proj);
?>