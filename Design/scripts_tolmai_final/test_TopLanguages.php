<?php
require_once('get_TopLanguages.php');
function dados_grafico(){
$lista = top_geral();
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
 {
 $total += $value;
}
$count = 0;
 $arr = array();
 $str = "";
 //echo "[";
foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 //$arr[$count]=array( $key , $value );
 echo "['".$key."', ".$value."]";
 If($count < 9 )
 echo ",";
 $count++;
 }
 //echo "]";
 //return $arr;
}
dados_grafico();
?>
