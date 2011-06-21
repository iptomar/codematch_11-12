<?php
require ("get_last_updated.php");
$resultado = get_date("Github");

echo "Projectos mais acedidos do repositorio Github<br /><br /><br />";
foreach ($resultado as $key=>$value) 
{
	//indices de array
	foreach ($value as $iKey => $iValue)
	{
		if ($iKey == 'tm_date_l')
		{
			//coluna data de criacao
			echo "Data de criacao:$iValue <br/>";
		}
		else
		{
			//coluna fullname
			echo "Nome do projecto:$iValue <br/>";
		}
	}
echo "------------------------------------------<br /><br />";
}

?>
