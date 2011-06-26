<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');

function top(){
$conn = new Connection('DBCola');
if( !ini_get('safe_mode') )
		{
            set_time_limit(180);
        }
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
			//linguagem->nК
			$arr_lang[$lang] = $aux;
		}
		
		//mete na primeira posiчуo do array o numero total de linguagens
		//$arr_lang['total'] = $count;
		
		//ordena o array
		arsort($arr_lang);



print_r($arr_lang);

}
top();
?>