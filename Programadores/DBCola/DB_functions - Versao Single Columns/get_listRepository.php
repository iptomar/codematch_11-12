<?php
//lista todos os projectos na base de bados
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');


	function get_listRepository($repo){
$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');
	
		$index_exp = CassandraUtil::create_index_expression('tm_repository',$repo);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp));
	$rows = $column_family->get_indexed_slices($index_clause);
	

	$arr_lang = array();

	


	foreach($rows as $key => $columns) {
	
		$arr_lang[$key]=$columns;
	
	}
	return ($arr_lang);
	}
	
?>