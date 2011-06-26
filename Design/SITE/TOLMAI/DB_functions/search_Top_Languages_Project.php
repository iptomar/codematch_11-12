<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

function top($repo){
$conn = new Connection('DBCola');

//selects language database
$column_lang= new ColumnFamily($conn,'language');
$column_repo = new ColumnFamily($conn,'repos');
$arr_lang = array();
$count =0;

	$rows = $column_lang->get_range($key_start='', $key_finish='',100000);
	//projectos	
	foreach ($rows as $key=>$value) 
	{
	$count=0;
	//linguagem	
	foreach ($value as $key1=>$value1){
			
			$pesquisa = $column_repo ->get($repo,null,"","",false,100000,null,null);
			//projectos
			foreach ($pesquisa as $key4=>$value4) {
					//compara se projectos iguais
					if($value1==$value4)
							{
							$count++;}
							}

			$lang = $key;
			//linguagem->nº
			$arr_lang[$lang] = $count;													
							}		
	}
arsort($arr_lang);
return($arr_lang);
}
?>