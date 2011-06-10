<?php

//Vai buscar a primeira linguagem de cada projecto da tabela tm_logs uma grande quantidade de vezes

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('tolmai');

$column_family = new ColumnFamily($conn, 'tm_logs');
$time_start = microtime(true);
for($num=0;$num < 100000000; $num++) {
	$numproj=0;
	
	$index = $column_family->get_range($key_start='', $key_finish='',100000000, $columns=array('language1', 'plang1'));
	
	foreach($index as $key => $result) {
	print_r("<br>");
	


	print_r($result);
	$numproj++;
	
	}
}
$time_end = microtime(true);
$time_seg = $time_end - $time_start;
$time_min = $time_seg / 60;
echo "<p>Registos acedidos em $time_min minutos e $time_seg segundos\n\n</p>";
echo('Numero de projectos:' .$numproj);
echo("\n");

	
?>
