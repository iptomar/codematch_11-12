<?php

require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');


//this function inserts all data to all FOUR main databases
/*INPUTS:
proj_name - nome do projecto <string>
source - url do projecto <string>
repos - repositorio de origem <string>
data_c - data criacao <date format>
data_lst - data ultima actualizacao <date format>
logo - logotipo url <string>
lang - linguagens do projecto <array -string>
author - autor/es do projecto <array -string>
*/

function insert($proj_name,$source,$repos,$data_c,$data_lst,$logo,$lang,$author){
$conn = new Connection('DBCola');

//select databases
$column_detail= new ColumnFamily($conn,'projects');
$column_lang= new ColumnFamily($conn,'language');
$column_author= new ColumnFamily($conn,'author');
$column_repos= new ColumnFamily($conn,'repos');

//insert data on project details DB
$column_detail -> insert($proj_name, array('source' => $source, 'date_c' => $data_c, 'date_l' => $data_lst, 'logo' => $logo));


//insert data on languages DB
$cp = count($lang);
for ($l = 0; $l < $cp; $l++){
	$column_lang -> insert($lang[$l],array(CassandraUtil::uuid1() => $proj_name));
}

//insert data on authors DB
$comp = count($author);
for ($j = 0; $j < $comp; $j++){
	$column_author -> insert($author[$j],array(CassandraUtil::uuid1() => $proj_name));
}

//insert data on repository DB
$column_repos ->insert($repos,array(CassandraUtil::uuid1() => $proj_name));


}



?>