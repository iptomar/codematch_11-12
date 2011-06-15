<?php


//percentagem de linguagem por projecto
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');


function logs($proj){
$no = "null";
try{
$conn = new Connection('DBCola');

//selects autor database
$column_family= new ColumnFamily($conn,'logs_lang');
//Selects hits languages
$rows = $column_family->get($proj);
$arr_lang = array();
foreach($rows as $key => $columns) {
$json = json_decode($columns);
return($json);
}

}	
	catch(Exception $x){
		return($no);
	}
}
//

?>