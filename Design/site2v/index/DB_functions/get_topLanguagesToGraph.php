<?php
require_once('get_TopLanguages_v2.php');
function dados_grafico(){
$lista = get_top();
$listaTop = array_slice($lista, 0, 10);

foreach ($listaTop as $key => $value)
 echo "['".$key."', ".$value."],";
}
?>
