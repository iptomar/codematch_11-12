<?php

//JOAO dinis
//calcula o tempo que demora a inserir um milhao de dados aleatorios
//e a fazer os gets dos mesmos.


require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('Keyspace1');

$column_family = new ColumnFamily($conn, 'Standard1');

echo "Comecou a Inserir as: ";
echo date('h:i:s');
print_r("<br>");
for ($num=1; $num<=1000; $num++)
{
	$num_alea = rand(1, 1000);
	$column_family->insert($num_alea, array('numero' => $num));
	//echo "id: " . $num . "\n"; 
}
echo "\n\nINSERTS DONE as: ";
echo date('h:i:s');
print_r("<br>");
echo "\n\nComecou os gets!\n";
print_r("<br>");
for ($num=1; $num<=1000; $num++)
{
	$num_alea = rand(1, 1000);
	$re = $column_family->get($num_alea, $columns=array('numero'));
	print_r($re);
	print_r("<br>");
}
echo "GETS DONE as: "; 
echo date('h:i:s');
print_r("<br>");
?>
