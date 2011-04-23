<?php
//nao finalizado!!!
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');


function get_date(){
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');
	$repo='Github';
//------------------- Search repository ----------------
	$index_exp = CassandraUtil::create_index_expression('tm_repository',$repo);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp));
	$rows = $column_family->get_indexed_slices($index_clause);
	$teste = array();
	//project counter
	$count =0;
	$i=1;
foreach($rows as $key => $columns) {
    //count matches
	$count++;
	asort($frutas);

	$test=$column_family->get($key,$columns=array('tm_fullname','tm_date_c'));
	
	$teste[$i]=$test;

	$i++;

	arsort($teste);

	}
	
	return ($teste);
	}



?>