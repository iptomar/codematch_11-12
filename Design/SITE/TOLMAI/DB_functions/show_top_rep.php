<!-- Constroi string com linguagens e percentagens de top de linguagens 
de todos os repositórios. Usado no gráfico-->
<?php
require_once('search_Top_Languages_Project.php');//
function dados_for_topRep(){
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
?>
