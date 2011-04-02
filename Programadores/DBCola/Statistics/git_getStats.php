//untested

<?php

echo "git projects statistics .\n";

$conn = new Connection('Keyspace');
$column_family= new ColumnFamily($conn , 'tolmai');

//create index columns
$index_exp = CassandraUtil::creat_index_expression('tm_repository',github);
//index clause
$index_clause = CassandraUtil::create_index_clause(array($index_exp));
//retrieve results
$rows = $column_family->get indexed_slices($index_clause);

$count = 1;
foreach($rows as $key => $columns) {
  //Do stuff with $key => $columns
  $count ++;
  }
  Print_r($count);


?>