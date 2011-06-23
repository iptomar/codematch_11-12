<!-- Criado por Carma Fernandes
 Query que procura projectos por determinada data -->
<?php require_once('phpcassa/connection.php'); 
require_once('phpcassa/columnfamily.php'); //this function sort tm_date in descending order by repository 
//funcao que retorna projectos com uma data de criacao inserida como parametro.
//Retorna array com data de criacao, repositorio e fullname
function get_date($data){
	$conn = new Connection('tolmai');
	$column_family= new ColumnFamily($conn,'tm');
	$index_exp = CassandraUtil::create_index_expression('tm_date_c',$data);
	$index_clause = CassandraUtil::create_index_clause(array($index_exp));
	$rows = $column_family->get_indexed_slices($index_clause);
	$dados = array();
	$i=1;
	foreach($rows as $key => $columns)
	{
		$test=$column_family->get($key,$columns=array('tm_date_c','tm_repository','tm_fullname'));
		$dados[$i]=$test;
		$i++;
	}
	//Sort an array in reverse order and maintain index association
	arsort($dados);
	return ($dados);
	}
	//get_date("20080926");
?>
