<?php
$brush_price = 5; 

echo "\t Teste 4\n";
for ( $counter = 1; $counter <= 10000000; $counter += 1) {
	echo " $counter - ";
	echo $brush_price * $counter;
	echo " - Teste 4\n ";
}
echo "Fim do teste 4!!!!!!!!!!!";
?>