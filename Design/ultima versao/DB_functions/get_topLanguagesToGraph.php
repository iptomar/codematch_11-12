<?php
require_once('get_TopLanguages_v2.php');
function dados_grafico(){
$lista = get_top();
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
 $total += $value;

foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 echo "['".$key."', ".$value."],";
 }
}
?>
