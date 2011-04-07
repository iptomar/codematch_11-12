<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('tolmai');

$column_family= new ColumnFamily($conn , 'tm');

$result =$column_family->get('1',$columns=array('tm_nomeproj'));
print_r($result);


?>