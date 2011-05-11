<?php
$brush_price = 5; 

echo "\t Teste 2\n";
for ( $counter = 1; $counter <= 10000000; $counter += 1) {
	echo " $counter - ";
	echo $brush_price * $counter;
	echo " - Teste 2\n ";
}
echo "Fim do teste 2!!!!!!!!!!!";
?>