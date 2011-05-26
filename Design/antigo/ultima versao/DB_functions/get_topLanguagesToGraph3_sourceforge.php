<?php
require_once('getTopLanguages_v4.php');

function dados_grafico_repo(){
$lista = get_top_source("Sourceforge");
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
 $total += $value;

foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 echo "['".$key."', ".$value."],";
 //print_r($key."--".$value."<br />");
 
 }
 //print_r("ola");
}
//dados_grafico_rep();
?>