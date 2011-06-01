<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

//#################GITHUB##################
$name='Github';
$repo1='Github';
$description1="GitHub e um Servico de Web Hosting Compartilhado para projetos que usam o controle de versionamento Git";
$logo1='';
$url1="http://github.com/";

//#############################SourceForge######
$name='SourceForge';
$repo1='SourceForge';
$description1="SourceForge.net e um localizador centralizado de desenvolvedores de software para controlar e manter o desenvolvimento de open sources actuando como um repositorio de codigo fonte.";
$logo1='';
$url1="http://sourceforge.net/";		

//######################Launchpad###########
$name='Launchpad';
$repo1='Launchpad';
$description1="Launchpad e uma aplicacao web e sitio web para o auxilio no desenvolvimento de software, particularmente software livre.";
$logo1='';
$url1="https://launchpad.net/";

		//make connection with database
		$conn = new Connection('tolmai');

		//select column family
		$column_family= new ColumnFamily($conn ,'tm_repo');

		//single insert
		$column_family-> insert($name,array("name" => $repo1));
		$column_family-> insert($name,array("description" => $description1));
		$column_family-> insert($name,array("logo" => $logo1));
		$column_family-> insert($name,array("url" => $url1));
	
?>