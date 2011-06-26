
<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('Keyspace1');

//select column family
$column_family = new ColumnFamily($conn, 'Standard1');

echo "Comecou a Inserir!";
//vai buscar o tempo em que começou a inserir os registos
$time_start = microtime(true);
for ($qnt=1; $qnt<=1000000; $qnt++)
{		
		$num=rand(1,1000000);
        $column_family->insert($num, array('numero' => $num));
        echo "id: " . $num . "\n";
}
//vai buscar o tempo final depois dos registos serem inseridos
$time_end = microtime(true);
$time_seg = $time_end - $time_start;
$time_min = $time_seg / 60;
echo "<p>Registos inseridos em $time_min minutos e $time_seg segundos\n\n</p>";


echo "\n\nComecou a aceder!\n";
//vai buscar o tempo em que começou a aceder aos registos
$time_start = microtime(true);
for ($qnt=1; $qnt<=1000000; $qnt++)
{		
		$num=rand(1,1000000);
        $re = $column_family->get($num, $columns=array('numero'));
        print_r($re);
}
//vai buscar o tempo final depois dos registos serem acedidos
$time_end = microtime(true);
$time_seg = $time_end - $time_start;
$time_min = $time_seg / 60;
echo "<p>Registos acedidos em $time_min minutos e $time_seg segundos\n\n</p>";
echo "\n";
?>

