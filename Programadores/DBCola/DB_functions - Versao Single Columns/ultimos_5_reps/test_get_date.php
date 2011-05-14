<?php

require ("get_last_updated.php");

$resultado = get_date("Github");

//$res = array_slice($resultado, 0, 5);

echo "Projectos mais acedidos do repositorio Github<br /><br /><br />";
foreach ($resultado as $key=>$value) {
//foreach ($res as $key=>$value) {
//echo "$key.<br/>";
foreach ($value as $iKey => $iValue) {
if ($iKey == 'tm_date_c'){
echo "Data de criacao:$iValue <br/>";
}
else
{echo "Nome do projecto:$iValue <br/>";
}
//echo "$iValue <br/><br/>";
}
echo "------------------------------------------<br /><br />";
}

//print_r($resultado);
//print_r("\n")



?>
