<?php
require_once('get_TopLanguagesRepo.php');
function dados_grafico($repo){
$lista = top($repo);
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
 $total += $value;

foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 echo "['".$key."', ".$value."],";
 }
}
dados_grafico("Github");
?>
