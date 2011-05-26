<?php
require ("db_insert.php");

$arr = array("a","b","c");
$art = array("a","b","c");
$res =insert_db("Proj","Proj","Proj","Proj",$arr,$art,"Proj","Proj");
print_r($res);
?>
