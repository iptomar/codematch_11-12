<!-- Constroi string com linguagens e percentagens de top de linguagens 
de todos os repositórios. Usado no gráfico-->
<?php
require_once('search_Top_To_Graph_v6.php');//
function dados_for_top(){
$lista = top_languages_to_Graph();
$listaTop = array_slice($lista, 0, 10);
$total = 0;
foreach ($listaTop as $key => $value)
 $total += $value;

foreach ($listaTop as $key => $value){
 $value = round(($value/$total)*100,2);
 echo "['".$key."', ".$value."],";
 }
}
//dados_for_top();
?>
