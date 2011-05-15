<!-- Criado por Carma Fernandes
Returns projects searched by language-->
<?php
require ("search_language.php");
//get results
$resultado = get_lang("PHP");
echo "Pesquisa de projectos por linguagem (PHP)<br /><br /><br />";
//array index
foreach ($resultado as $key=>$value) {
//results
foreach ($value as $iKey => $iValue) {
if ($iKey == 'tm_author'){
echo "Autor: $iValue <br/>";
}
else if ($iKey == 'tm_repository')
{
echo "Repositorio: $iValue <br/>";
}
else
{
echo "Nome: $iValue <br/>";
}
}
echo "------------------------------------------<br /><br />";
}

//print_r($resultado);
//print_r("\n")



?>
