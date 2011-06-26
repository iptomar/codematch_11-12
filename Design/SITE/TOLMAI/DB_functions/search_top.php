<?php
require_once('search_TopLanguages.php');
function dados_get_top(){
$lista = top();

$total = 0;
foreach ($lista as $key => $value)
 $total += $value;

foreach ($lista as $key => $value){
 $value = round(($value/$total)*100,2);
 echo "<p><b>".$key." - </b>".$value." %</p>";
 }
}
dados_get_top();
?>