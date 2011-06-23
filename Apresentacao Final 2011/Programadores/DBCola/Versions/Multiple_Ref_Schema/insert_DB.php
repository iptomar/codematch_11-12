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
$conn = new Connection('testes_DBCola');
//select databases
$column_detail= new ColumnFamily($conn,'projects');
$column_presence = new ColumnFamily($conn,'presence');
$column_lang= new ColumnFamily($conn,'language');
$column_author= new ColumnFamily($conn,'author');
$column_repos= new ColumnFamily($conn,'repos');

/************************/
//control test to avoid multiple references of the same project due to dabase schema in use

try{
/**try to get/find project**/
$test_cond = $column_detail -> get($proj_name);

/*************************************
The following test will test the repo
where the project lies.
This test will set multiple references
to the same project on different
repos.
***********************************/

//split url by '.'
$temp = explode('.',$source);
//get the repository name and change the first letter to Uppcase
$presence = ucfirst($temp[1]);

//search the project presences on repositorys

$search = $column_presence -> get($proj_name);

//set each repo status report
$x = $search['repo_S']; //sourceforge check
$y = $search['repo_G']; //github check
$z = $search['repo_L']; //launchpad check

//test repository presence
if(strcmp($presence,$x) ) {
}elseif(strcmp($presence,$y) ) {
}elseif(strcmp($presence,$z) ) {}
else {

//*****Insert data
//project details DB
$column_detail -> insert($proj_name, array(CassandraUtil::uuid1() => array('source' => $source, 'date_c' => $data_c, 'date_l' => $data_lst, 'logo' => $logo)));


//languages DB
$cp = count($lang);
for ($l = 0; $l < $cp; $l++){
	$column_lang -> insert($lang[$l],array(CassandraUtil::uuid1() => $proj_name));
}

//authors DB
$comp = count($author);
for ($j = 0; $j < $comp; $j++){
	$column_author -> insert($author[$j],array(CassandraUtil::uuid1() => $proj_name));
}

//repository DB
$column_repos ->insert($repos,array(CassandraUtil::uuid1() => $proj_name));

//repository presence DB
if($presence == "Sourceforge"){
$column_presence -> insert($proj_name, array('repo_S' => "Sourceforge"));
}

if($presence == "Github"){
$column_presence -> insert($proj_name, array('repo_G' => "Github"));
}

if($presence == "Launchpad"){
$column_presence -> insert($proj_name, array('repo_L' => "Launchpad"));
}

}


}catch(Exception $x){
//*****Fail to find project, forward to db insertion *****//

//*****Insert data
//project details DB
$column_detail -> insert($proj_name, array(CassandraUtil::uuid1() => array('source' => $source, 'date_c' => $data_c, 'date_l' => $data_lst, 'logo' => $logo)));


//languages DB
$cp = count($lang);
for ($l = 0; $l < $cp; $l++){
	$column_lang -> insert($lang[$l],array(CassandraUtil::uuid1() => $proj_name));
}

//authors DB
$comp = count($author);
for ($j = 0; $j < $comp; $j++){
	$column_author -> insert($author[$j],array(CassandraUtil::uuid1() => $proj_name));
}

//repository DB
$column_repos ->insert($repos,array(CassandraUtil::uuid1() => $proj_name));


//repository presence DB
if($repos == "Sourceforge"){
$column_presence -> insert($proj_name, array('repo_S' => "Sourceforge"));
}

if($repos == "Github"){
$column_presence -> insert($proj_name, array('repo_G' => "Github"));
}

if($repos == "Launchpad"){
$column_presence -> insert($proj_name, array('repo_L' => "Launchpad"));
}

}

}




?>