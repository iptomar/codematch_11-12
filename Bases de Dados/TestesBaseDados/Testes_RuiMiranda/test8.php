<?php

//Acede ao codigo de cada linguagem um milhão de vezes e calcula o tempo que demorou

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('DBCola');

$column_family = new ColumnFamily($conn, 'helloworld');
$time_start = microtime(true);
for($num=0;$num < 1000000; $num++) {
	$numlang=0;
	
	$index = $column_family->get_range($key_start='', $key_finish='',100000000);
	
	foreach($index as $key => $result) {
	print_r("<br>");
	
	print_r($key);
	print_r("<br>");
	print_r($result);
	$numlang++;
	
	}
}
$time_end = microtime(true);
$time_seg = $time_end - $time_start;
$time_min = $time_seg / 60;
echo "<p>Registos acedidos em $time_min minutos e $time_seg segundos\n\n</p>";
echo('Numero de linguagens:' .$numlang);
echo("\n");

	
?>