<!-- Criado por Carma Fernandes
query that returns projects searched by language-->
<?php 
require_once('phpcassa/connection.php'); 
require_once('phpcassa/columnfamily.php');
//returns projects with linguagem inserted as a parameter
function get_lang($language){
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');
	//search in tm_language_P
	$index_landP = CassandraUtil::create_index_expression('tm_language_P',$language);
	//search in tm_language_S
	$index_landS = CassandraUtil::create_index_expression('tm_language_S',$language);
	//search in tm_language_T
	$index_landT = CassandraUtil::create_index_expression('tm_language_T',$language);
	//create clause for tm_language_P
	$index_clause1 = CassandraUtil::create_index_clause(array($index_landP));
	//create array for tm_language_P
	$rows1 = $column_family->get_indexed_slices($index_clause1);
	
	//create clause for tm_language_S
	$index_clause2 = CassandraUtil::create_index_clause(array($index_landS));
	//create array for tm_language_S
	$rows2 = $column_family->get_indexed_slices($index_clause2);
	
	//create clause for tm_language_T
	$index_clause3 = CassandraUtil::create_index_clause(array($index_landT));
	//create array for tm_language_T
	$rows3 = $column_family->get_indexed_slices($index_clause3);
	//array that contains data
	$date = array();
	$i=1;
	//add results for for tm_language_P
	foreach($rows1 as $key => $columns)
	{
		$test=$column_family->get($key,$columns=array('tm_author','tm_repository','tm_fullname'));
		$date[$i]=$test;
		$i++;
	}
	
	//add results for tm_language_S
	foreach($row2 as $key => $columns)
	{
		$test=$column_family->get($key,$columns=array('tm_author','tm_repository','tm_fullname'));
		$date[$i]=$test;
		$i++;
	}
	
	//add results for tm_language_T
	foreach($row3 as $key => $columns)
	{
		$test=$column_family->get($key,$columns=array('tm_author','tm_repository','tm_fullname'));
		$date[$i]=$test;
		$i++;
	}
	
	return ($date);
	//print_r($date);
	//print_r($i);
	}
	//get_lang("PHP");
?>
