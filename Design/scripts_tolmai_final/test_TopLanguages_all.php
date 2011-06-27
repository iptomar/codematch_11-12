<?php
require_once('get_TopLanguages.php');
function dados_grafico_all(){
$lista = top_geral();
$num = 0;
//$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($lista as $key => $value)
 {
 $total += $value;
 //conta número de linguagens;
 $num++;
}
$arr = array();//array de resultados
$count = 0;
 //echo "[";
foreach ($lista as $key => $value){
 $value = round(($value/$total)*100,2);
 //echo "['".$key."', ".$value."]";
 $arr[$key]=$value;
 //If($count < $num )
 //echo ",";
 //$count++;
 //print_r($arr);
 }
 echo json_encode($arr);
}
dados_grafico_all();
?>
