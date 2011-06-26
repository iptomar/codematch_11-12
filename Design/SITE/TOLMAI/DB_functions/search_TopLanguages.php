<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

function top(){
$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'language');
$arr_lang = array();
$count =0;

$rows = $column_lang->get_range($key_start='', $key_finish='');
	
	foreach ($rows as $key=>$value) 
	{
			$aux=$column_lang ->get_count($key);
			$count=$count+$aux;			
			//nome da linguagem
			$lang = $key;
			//linguagem->n�
			$arr_lang[$lang] = $aux;
		}
		
		//mete na primeira posi��o do array o numero total de linguagens
		//$arr_lang['total'] = $count;
		
		//ordena o array
		arsort($arr_lang);



return($arr_lang);

}

?>