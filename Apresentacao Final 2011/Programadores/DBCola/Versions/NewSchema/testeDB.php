<?php

require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

include_once('insert_DB.php');
include_once('search_lang_proj.php');
include_once('search_project_detail.php');
include_once('search_repo.php');
include_once('search_author.php');

$lang = array("C","VB");
$authr = array("X","Y");

//insert('Firefox','wwww.wwww.www','Github','20100511','20112020','ewwww.www',$lang,$authr);

$pesquisa=search_lang_proj("C");

foreach($pesquisa as $values){
    //get details of the matching projects from query $pesquisa
    $detail = search_project_detail($values);
	
	//print query result
	print_r($values);
	print("\n");
	
	//print query details
	print_r($detail);
}

//search projects in the given repo
$repo_search = search_repo("Github");
foreach($repo_search as $det){
print_r($det);
print("\n");
}

$auth=search_author("X");
foreach($auth as $au){
print_r($au);
print("\n");
}

?>