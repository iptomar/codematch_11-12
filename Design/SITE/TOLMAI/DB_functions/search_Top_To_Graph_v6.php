<?php
require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

include_once('phpcassa/uuid.php');
//cria array de linguagens e numero de projectos. 
//Usado no grбfico do top de linguagens de todos os repositуrios
function top_languages_to_Graph(){
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
			//linguagem->nє
			$arr_lang[$lang] = $aux;
		}
		
		//mete na primeira posiзгo do array o numero total de linguagens
		//$arr_lang['total'] = $count;
		
		//ordena o array
		arsort($arr_lang);



return($arr_lang);

}

?>