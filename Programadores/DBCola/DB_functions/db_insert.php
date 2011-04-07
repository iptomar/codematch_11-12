<?php
//inserting data
function db_insert($project,$source,$repository,$author,$language,$last_up,$logo)
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');
//make connection with database
$conn = new Connection('tolmai');
//select column family
$column_family= new ColumnFamily($conn , 'tm');
//insert column family rows
$column_family->insert('tm',array('tm_nameproj' =>$project,'tm_source' =>$source,'tm_repository' =>$repository,'tm_author'=>$author,'tm_language'=>$language,'tm_lastupdate'=>$last_up,'tm_logo'=>$logo));

?>