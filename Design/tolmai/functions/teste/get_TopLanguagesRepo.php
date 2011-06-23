<?php
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');
include_once('../phpcassa/uuid.php');
//Top language by repository
//output: null (string) if dont find project
//		  Array array of languages


function top($repo){
$no = "null";
try{
$conn = new Connection('DBCola');
//converts the first letter to uppercase
$aux= ucfirst($repo);
//selects language database
$column_lang= new ColumnFamily($conn,'language');
$column_repo = new ColumnFamily($conn,'repos');
$arr_lang = array();
$count =0;
//Selects all languages
$rows = $column_lang->get_range($key_start='', $key_finish='',100000);
foreach ($rows as $key=>$value) 
	{

	
		
	foreach ($value as $key1=>$value1) {$count=0;
			//Selects projects per repository
	$pesquisa = $column_repo ->get($aux,null,"","",false,100000,null,null);
	
	foreach ($pesquisa as $key2=>$value2)
			{
									if($value1==$value2)
								{
									
							$count++;
							$lang = $key;
				if($lang!='N/A')
			$arr_lang[$lang] = $count;
								}
			}		
			
	}			
			}
		//orders the array								
		arsort($arr_lang);
		return $arr_lang;
		
		}
	
			
	catch(Exception $x){
		return $no;
	}}
	//top("Github");
?>