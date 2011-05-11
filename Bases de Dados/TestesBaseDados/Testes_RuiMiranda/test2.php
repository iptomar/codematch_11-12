
<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('Keyspace1');

$column_family = new ColumnFamily($conn, 'Standard1');

echo "Comecou a Inserir as: ";
echo date('h:i:s');
for ($qnt=1; $qnt<=1000000; $qnt++)
{		
		$num=rand(1,1000000);
        $column_family->insert($num, array('numero' => $num));
        echo "id: " . $num . "\n";
}
echo "\n\nINSERTS DONE as: ";
echo date('h:i:s');
echo "\n\nComecou os gets!\n";
for ($qnt=1; $qnt<=1000000; $qnt++)
{		
		$num=rand(1,1000000);
        $re = $column_family->get($num, $columns=array('numero'));
        print_r($re);
}
echo "GETS DONE as: ";
echo date('h:i:s');
echo "\n";
?>

