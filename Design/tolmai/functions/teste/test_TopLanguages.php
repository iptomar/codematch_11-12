<?php
require_once('get_TopLanguages.php');
function dados_grafico(){
$lista = top_geral();
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
 $total += $value;

foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 echo "['".$key."', ".$value."],";
 //echo "\n";
 }
}
dados_grafico();
?>
