<?php require_once('phpcassa/connection.php'); 
require_once('phpcassa/columnfamily.php'); //this function sort tm_date in descending order by repository 
function get_date($repo){
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');
	
	$index_exp = CassandraUtil::create_index_expression('tm_repository',$repo);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp));
	$rows = $column_family->get_indexed_slices($index_clause);
	
	$date = array();
	$i=1;
	
	foreach($rows as $key => $columns)
	{
		$test=$column_family->get($key,$columns=array('tm_fullname','tm_date_l'));
		$date[$i]=$test;
		$i++;
	}
	//Sort an array in reverse order and maintain index association
	arsort($date);
	
	return ($date);
	}
?>
