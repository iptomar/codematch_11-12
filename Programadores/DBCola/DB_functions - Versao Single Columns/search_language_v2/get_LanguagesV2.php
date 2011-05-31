<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

function get_lang($lang){

	//$arr = array_map("strtoupper",$lang);
	//   $lan_array = array_map("strtoupper", $lang);
try{
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');
	

	$arr_lang = array();
	
	
	$index_exp = CassandraUtil::create_index_expression('tm_language_P',$lang);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp),'', $column_count=100000);
	$rows = $column_family->get_indexed_slices($index_clause);
	
	foreach($rows as $key => $columns) {
	
		$arr_lang[$key]=$columns;
	
	}
	
	
	$index_exp = CassandraUtil::create_index_expression('tm_language_S',$lang);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp),'', $column_count=100000);
	$rows = $column_family->get_indexed_slices($index_clause);
	
	foreach($rows as $key => $columns) {
	
	$arr_lang[$key]=$columns;
	
	}
	
	$index_exp = CassandraUtil::create_index_expression('tm_language_T',$lang);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp),'', $column_count=100000);
	$rows = $column_family->get_indexed_slices($index_clause);
	
	foreach($rows as $key => $columns) {
	
		$arr_lang[$key]=$columns;
	
	}

	return ($arr_lang);
	}	
	catch(Exception $x){
		error_log($x);
	}
}
?>