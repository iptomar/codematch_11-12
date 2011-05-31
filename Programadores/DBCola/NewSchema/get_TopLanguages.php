<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function top_geral(){
try{
$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'language');
$arr_lang = array();
$count =0;
//Selecciona  todas as linguagens 
$rows = $column_lang->get_range($key_start='', $key_finish='',1000000);
	
	foreach ($rows as $key=>$value) 
	{		//conta o numero de projectos de cada linguagem
			$aux=$column_lang ->get_count($key);
			//conta o numero de projectos no total
			$count=$count+$aux;			
			//nome da linguagem
			$lang = $key;
			//linguagem->nК
			$arr_lang[$lang] = $aux;
		}
		
		//mete na primeira posiчуo do array o numero total de linguagens
		//$arr_lang['total'] = $count;
		//ordena o array
		arsort($arr_lang);
return($arr_lang);
}	
	catch(Exception $x){
		error_log($x);
	}
}

?>