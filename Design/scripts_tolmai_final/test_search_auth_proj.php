<?php require_once('search_auth_proj.php'); 
function dados_search_auth($auth)
{ 
$auth = $_GET['dat']; 
$auth =trim($auth); 
$lista = search_auth_proj($auth); 
$count = 0; 
//array de resultados
 $arr = array(); 
foreach ($lista as $key => $value){
  $arr[$count]=array($value);
  $count++;
 }
 echo json_encode($arr);
}
$auth = $_GET['dat']; 
//$repo = "Github"; 
dados_search_auth($auth); ?>
