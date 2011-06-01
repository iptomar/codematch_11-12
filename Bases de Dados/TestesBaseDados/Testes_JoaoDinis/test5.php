<?php

//faz um milhao de gets ao projecto

function get_proj($proj){
for($i=0;$i<1000000;$i++){
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

//make connection with database
$conn = new Connection('tolmai');

//select column family
$column_family= new ColumnFamily($conn , 'tm');

$result =$column_family->get($proj);
//return results
print_r ($result);
print_r("<br>");
}
}

get_proj('surl');
?>