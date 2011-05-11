<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('Keyspace1');

$column_family = new ColumnFamily($conn, 'Standard1');

$column_family->insert('1', array('nome' => 'rui teste'));




$re = $column_family->get('1', $columns=array('nome'));

print_r($re);
?>
