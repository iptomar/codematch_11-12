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
Echo "Editar a data no ficheiro php<br /><br />";
//se o array esta vazio
if (empty($res))
{
			echo "Nao foram encontrados projectos com essa data.";
}//caso contrario
else
{	//para cada indice do array
	foreach ($res as $key=>$value)
	{	//imprime as linhas
		foreach ($value as $iKey => $iValue)
		{
			echo $iValue;
		}
	//echo "------------------------------------------<br /><br />";
	}
}
?>
