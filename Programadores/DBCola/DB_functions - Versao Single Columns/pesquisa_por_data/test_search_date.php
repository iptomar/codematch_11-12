<!--Criado por Carma Fernandes 
Pesquisa de projectos por data. Retorna data de criacao, fullname e repositorio.
-->
<?php
require('search_date.php');
//require("pack_date.php");
//Editar a data
$dat = "20090818";
$resultado = get_date($dat);
$res = array_slice($resultado, 0, 10);

echo "Projectos acedidos em determinada data<br /><br /><br />";
if (empty($res))
{
			echo "Nao foram encontrados projectos com essa data.";
}
else
{
	foreach ($res as $key=>$value)
	{
		foreach ($value as $iKey => $iValue)
		{
			if ($iKey == 'tm_date_c'){
				echo "<b>Data de criacao</b>: $iValue <br/>";
			}
			else if ($iKey == 'tm_repository')
			{
				echo "<b>Repositorio</b>: $iValue <br/>";
			}
			else
			{
				echo "<b>Descricao</b>: $iValue <br/>";
			}

		}
	echo "------------------------------------------<br /><br />";
	}
}
?>
