<?php

//inserting data
function db_insert($project,$source,$repository,$author,$language,$last_up)
{
//make connection with database
$conn = new Connection('Keyspace');
//select column family
$column_family= new ColumnFamily($conn , 'tolmai');
//insert column family rows
$column_family->insert('tolmai',array('tm_rpoject' =>$project,'tm_source' =>$source,'tm_repository' =>$repository,'tm_author'=>$author,'tm_language'=>$language,'tm_lastupdate'=>$last_up));
}
?>