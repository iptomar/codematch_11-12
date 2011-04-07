<?php
	require_once('phpcassa/connection.php');
	require_once('phpcassa/columnfamily.php');
	$conn = new Connection('tolmai');
	$column_family = new ColumnFamily($conn, 'tm');
	
	/*este nao esta completo porque nao esta a inserir 
     *automaticamente porque nao sabemos o numero de linhas 
	 *que a tabela tem.
	 *Falta alguns campos pa tabela, mas na informacao
	 *da API nao encontrei o nome dos campos que faltam.
	 */
	
	function obter_github($projecto){
		$request = 'http://github.com/api/v2/json/repos/search/'.$projecto;
		//le o ficheiro para uma string
		$response = file_get_contents($request);		
		//descodifica uma string json
		$jsonobj = json_decode($response);
		//Imprime os resultados
		foreach($jsonobj->repositories as $arg) { 
			$column_family->insert($num, array('tm_nameproj' => $arg->name));
			$column_family->insert($num, array('tm_author' => $arg->username));
			$column_family->insert($num, array('tm_lastupdate' => $arg->pushed_at));
			$column_family->insert($num, array('tm_language' => $arg->language));
			$column_family->insert($num, array('tm_repository' => "github"));			
			
	}
?>