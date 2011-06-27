<?php
require_once('get_TopLanguages.php');
function dados_grafico_3(){
$lista = top_geral();
$listaTop = array_slice($lista, 0, 3);
$total = 0;
foreach ($listaTop as $key => $value)
 {
 $total += $value;
}
$count = 0;
 $arr = array();
 $str = "";
 
foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 //$arr[$count]=array( $key , $value );
 echo $key;
 If($count < 2 )
 echo ", ";
 $count++;
 }
 //echo "]";
 //return $arr;
}
dados_grafico_3();
?>
