<?php

//Faz 100000 de gets de alguns campos do projecto toto e depois de todos os campos do mesmo projecto para comparação de tempos

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family = new ColumnFamily($conn, 'tm');

	//vai buscar o tempo incial
	$time_start = microtime(true);
	
	for($num=0;$num < 100000; $num++){
	print_r("<br>");
	//acede a apenas alguns campos do projecto toto
	$result = $column_family->get('toto', $columns=array('tm_author', 'tm_fullname', 'tm_language_P', 'tm_date_c', 'tm_source'));

	
	print_r($result);
	}
	//vai buscar o tempo final
	$time_end = microtime(true);
	$time_seg = $time_end - $time_start;
	$time_min = $time_seg / 60;
	echo "<p>Registos acedidos em $time_min minutos e $time_seg segundos\n\n</p>";
	
	//vai buscar o tempo incial
	$time_start = microtime(true);
	for($num=0;$num < 100000; $num++){
	print_r("<br>");
	//acede a todos os campos do projecto toto
	$result = $column_family->get('toto');

	
	print_r($result);
	}
	//vai buscar o tempo final
	$time_end = microtime(true);
	$time_seg = $time_end - $time_start;
	$time_min = $time_seg / 60;
	echo "<p>Registos acedidos em $time_min minutos e $time_seg segundos\n\n</p>";

	
?>
