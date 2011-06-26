<?php require_once('search_lang_single_proj.php'); 

function dados_search_lang_single_proj($proj1)
{ 

$proj1 = $_GET['dat']; 
$proj1 =trim($proj1); 
$lista = search_auth_single_proj($proj1); 
$count = 0; 
//array de resultados
 $arr = array(); 
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}
$proj = $_GET['dat']; 
$proj = "gordon";
dados_search_lang_single_proj($proj); ?>
