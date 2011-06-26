<?php

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');
if( !ini_get('safe_mode') )
		{
            set_time_limit(180);
        }
include_once('insert_DB.php');
include_once('search_lang_proj.php');
include_once('search_project_detail.php');
include_once('search_repo.php');
include_once('search_author.php');

$lang = array("C","VB");
$authr = array("X","Y");

//insert('Firefox','wwww.wwww.www','Github','20100511','20112020','ewwww.www',$lang,$authr);
$proj_lang = 0;
$proj_rep = 0;
$pesquisa=search_lang_proj("PHP");

foreach($pesquisa as $values){
    //get details of the matching projects from query $pesquisa
    $detail = search_project_detail($values);
	
	//print projects with specified language
	print_r($values);
	print_r("     -     ");
	$proj_lang++;
	//print projects details
	print_r($detail);
	print_r("<br/>");
}
print_r("<br/><br/>");
print_r("<b>Numero de projectos encontrados:</b> ".$proj_lang);
print_r("<br/><br/><br/><br/><br/><br/><br/>");




//search projects in the given repo
print_r("<b>Projects of Sourceforge</b><br/>");
$repo_search = search_repo("Sourceforge");
foreach($repo_search as $det){
print_r($det);
print_r("<br/>");
$proj_rep++;
}
print_r("<b>Numero de projectos do repositorio:</b> ".$proj_rep);
print_r("<br/><br/><br/><br/><br/><br/><br/>");
print_r("<b>Author</b><br/>");
$auth=search_author("Y");
foreach($auth as $au){
print_r($au);
print_r("<br/>");
}

?>