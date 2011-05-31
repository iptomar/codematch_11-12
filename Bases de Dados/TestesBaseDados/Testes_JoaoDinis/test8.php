<?php
//Joao Dinis nº11472
//Funçao pa inserir 

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');



function insert($proj_name,$source,$repos,$data_c,$data_lst,$logo,$lang,$author){
$conn = new Connection('DBCola');

$column_detail= new ColumnFamily($conn,'projects');
$column_lang= new ColumnFamily($conn,'language');
$column_author= new ColumnFamily($conn,'author');
$column_repos= new ColumnFamily($conn,'repos');

//project details DB
$column_detail -> insert($proj_name, array('source' => $source, 'date_c' => $data_c, 'date_l' => $data_lst, 'logo' => $logo));


//languages DB
$cp = count($lang);
for ($l = 0; $l < $cp; $l++){
	$column_lang -> insert($lang[$l],array(CassandraUtil::uuid1() => $proj_name));
}

//authors DB
$comp = count($author);
for ($j = 0; $j < $cp; $j++){
	$column_author -> insert($author[$j],array(CassandraUtil::uuid1() => $proj_name));
}

//repository DB
$column_repos ->insert($repos,array(CassandraUtil::uuid1() => $proj_name));


}
/*
$lang = array("C","VB");
$authr = array("X","Y");
insert('Firefox','wwww.wwww.www','Github','20100511','20112020','ewwww.www',$lang,$authr);
insert('Ubuntu','wwww.wwww.www','Github','20100511','20112020','ewwww.www',$lang,$authr);
insert('Explorer','wwww.wwww.www','Github','20100511','20112020','ewwww.www',$lang,$authr);
*/


?>
