<?php
	//testes aos scripts de insercao
	require_once('phpcassa/connection.php');
	require_once('phpcassa/columnfamily.php');
	include_once('phpcassa/uuid.php');
	include_once('insert_DB.php');
	
	$lang=array("C","Java","C++","Perl");
	$author=array("Ze","manel","inacio","rui");
	insert("ProjectoManel","http://www.github.com","Github","20012011","13541012","http://www.sdsafasfsf.com",$lang,$author);
	insert("ProjectoManel","http://www.sourceforge.com","Github","20012011","13541012","http://www.sdsafasfsf.com",$lang,$author);
	insert("ProjectoManel","http://www.launchpad.com","Github","20012011","13541012","http://www.sdsafasfsf.com",$lang,$author);
	insert("ProjectoManel","http://www.sourceforge.com","Github","20012011","13541012","http://www.sdsafasfsf.com",$lang,$author);
	insert("ProjectoManel","http://www.github.com","Github","20012011","13541012","http://www.sdsafasfsf.com",$lang,$author);
	
	$conn = new Connection('testes_DBCola');
	//select databases
	$column_detail= new ColumnFamily($conn,'projects');
	$column_presence = new ColumnFamily($conn,'presence');
	$column_lang= new ColumnFamily($conn,'language');
	$column_author= new ColumnFamily($conn,'author');
	$column_repos= new ColumnFamily($conn,'repos');
	
	$rows = $column_detail->get("ProjectoManel");
	print_r($rows);
	
?>