<?php 
require ("get_last_updated.php"); 
//resultado da query 
$resultado = get_date("Github"); 
//mostra apenas os 5 primeiros resultados 
$res = array_slice($resultado, 0, 5); 
foreach ($res as $key=>$value) {
	foreach ($value as $iKey => $iValue)
	{
		echo "$iValue";
	}
}
?>
