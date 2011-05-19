<?php
require_once('get_TopLanguages_v3.php');

function dados_grafico_rep(){
$lista = get_top_git("Github");
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