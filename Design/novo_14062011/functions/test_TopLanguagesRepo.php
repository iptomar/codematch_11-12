<?php
require_once('get_TopLanguagesRepo.php');
function dados_top_repo($repo){
$repo1 = $_GET['dat'];
//$repo = "Github";
$lista = top($repo1);
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
{
 $total += $value;
 }
$count = 0;
 $arr = array();
foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 //echo "['".$key."', ".$value."],";
  $arr[$count]=array( $key , $value );
  $count++;
 }
 echo json_encode($arr);
}
$repo = $_GET['dat'];
//$repo = "Github";
dados_top_repo($repo);

?>
