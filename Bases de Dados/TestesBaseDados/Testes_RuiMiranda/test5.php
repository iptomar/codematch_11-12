<?php
//Vai buscar todos os projectos que tenham como liguagem principal Java um milhão de vezes

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('tolmai');

$column_family = new ColumnFamily($conn, 'tm');
$numproj = 0;
	
	
	
	for($num=0;$num < 1000000; $num++) {
	

		$index_exp = CassandraUtil::create_index_expression('tm_language_P', JAVA);
		$index_clause = CassandraUtil::create_index_clause(array($index_exp));
		$index = $column_family->get_indexed_slices($index_clause);
		// returns an Iterator over:
		//    array('linguagem principal' => Java))

		foreach($index as $key => $result) {
			
			Print_r($result);
			$numproj ++;
		}
  
	}
echo($numproj);

	
?>
