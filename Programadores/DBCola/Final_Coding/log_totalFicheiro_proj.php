<?php

//total de ficheiros por projecto
require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');


function logs($proj){
$no = "null";
try{
$conn = new Connection('DBCola');

//selects autor database
$column_family= new ColumnFamily($conn,'logs_lang');
//Selects hits languages
$rows = $column_family->get($proj,$columns=array('total'));
return $rows;

}	
	catch(Exception $x){
		return($no);
	}
}
//

?>