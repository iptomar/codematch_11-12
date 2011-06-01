<?php

//Joao Dinis
//Faz get aos projectos  da nova base dados .
//da para ver o uuid
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');


try{
$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'projects');

//Selecciona  todas as linguagens 
$rows = $column_lang->get_range($key_start='', $key_finish='',1000000);

	foreach ($rows as $key=>$value) 
	{		//conta o numero de projectos de cada linguagem
				//$aux=$column_lang ->get_count($key);
			//conta o numero de projectos no total
				//$count=$count+$aux;			
			//nome da linguagem
				//$lang = $key;
			//linguagem->n?
				//$arr_lang[$lang] = $aux;
			print_r("<br>");
			Print_r($key);
			print_r("<br>");
			echo htmlspecialchars (Print_r($value,true));
			print_r("<br>");
			print_r("<br>");
		}

		
}	
	catch(Exception $x){
		error_log($x);
	}


?>