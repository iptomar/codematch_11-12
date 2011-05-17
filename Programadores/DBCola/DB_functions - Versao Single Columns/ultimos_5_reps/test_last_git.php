<?php require ("get_last_updated.php"); 
$resultado = get_date("Github"); 

$res = array_slice($resultado, 0, 5); echo 
"Ultimos 5 projectos acedidos do repositorio Github<br /><br /><br />"; 

foreach ($res as $key=>$value) 
	{ 
	foreach ($value as $iKey => $iValue) { 
		if ($iKey == 'tm_date_c'){ 
			echo "Data de criacao:$iValue <br/>";
		}
		else 
		{
			echo "Nome do projecto:$iValue <br/>";
		}
	}
echo "------------------------------------------<br /><br />";
}
 ?>
