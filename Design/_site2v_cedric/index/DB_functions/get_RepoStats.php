<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//this function searches the repository content
//returns the projects count
//receives the repo name as argument
function get_RepoStats($repo){
	
$conn = new Connection('tolmai');

$column_family= new ColumnFamily($conn,'tm');	
	
//------------------- Search repository ----------------
$index_exp = CassandraUtil::create_index_expression('tm_repository',$repo);
$index_clause = CassandraUtil::create_index_clause(array($index_exp));
$rows = $column_family->get_indexed_slices($index_clause);

//project counter
$count =0;
foreach($rows as $key => $columns) {
    //count matches
	$count++;
   
}

//return hit count
return $count;

}

?>