<?php
//Joao Dinis n�11472
//Faz um 1 milh�o de gets a todos os dados que se encontram actualmente na base de dados.
//This function retrieves data on DB
for($i=0;$i<1000000;$i++){
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');




$rows = $column_family->get_range($key_start='mod_psgi', $key_finish='Epixa');

	foreach($rows as $key => $columns) {

		print_r("<br>");
		Print_r($columns );
		print_r("<br>");
	}

}

?>