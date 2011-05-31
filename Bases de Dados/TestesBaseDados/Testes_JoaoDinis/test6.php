<?php
//Joao Dinis nº11472
//Faz um 1 milhão de gets a todos os dados que se encontram actualmente na base de dados.

//for($i=0;$i<1000000;$i++){
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//
$proj=0;

$rows = $column_family->get_range($key_start='mod_psgi', $key_finish='Epixa',100000000);

	foreach($rows as $key => $columns) {

		print_r("<br>");
		echo htmlspecialchars (Print_r($columns,true));
		print_r("<br>");
		$proj++;
	}
print_r("<br>");
echo 'Nº de projectos '.$proj;

?>