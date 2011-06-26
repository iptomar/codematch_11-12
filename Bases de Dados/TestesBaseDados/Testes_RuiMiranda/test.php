<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('Keyspace1');

//select column family
$column_family = new ColumnFamily($conn, 'Standard1');

//insere na primeira linha
$column_family->insert('1', array('nome' => 'rui teste'));

//verifica se os dados foram inseridos
$re = $column_family->get('1', $columns=array('nome'));

//imprime o resultado do acesso no ecrã 
print_r($re);
?>
