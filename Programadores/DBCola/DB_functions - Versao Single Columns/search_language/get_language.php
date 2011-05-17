<!-- Criado por Carma Fernandes
Returns projects searched by language-->
<?php 
require ("search_language.php"); 
//query result
$resultado = get_lang("PHP"); 

//send result
foreach ($resultado as $key=>$value) {
	foreach ($value as $iKey => $iValue)
	{
		echo "$iValue";
	}
}
?>
