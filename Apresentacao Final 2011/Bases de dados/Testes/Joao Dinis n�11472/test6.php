<?php
//Joao Dinis n�11472
//Faz um 1 milh�o de gets a todos os dados que se encontram actualmente na base de dados.

//for($i=0;$i<1000000;$i++){
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

//
$proj=0;
echo "Comecou as: ";
echo date('h:i:s');
print_r("<br>");
$rows = $column_family->get_range($key_start='mod_psgi', $key_finish='Epixa',100000000);

	foreach($rows as $key => $columns) {

		print_r("<br>");
		echo htmlspecialchars (Print_r($columns,true));
		print_r("<br>");
		$proj++;
	}
print_r("<br>");
echo 'N� de projectos '.$proj;
print_r("<br>");
echo "Acabou as: ";
echo date('h:i:s');
print_r("<br>");

?>