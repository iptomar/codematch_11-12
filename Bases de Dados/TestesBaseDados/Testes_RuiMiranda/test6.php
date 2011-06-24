<?php
//Vai buscar todos os projectos da tabela tm e insere as linguagens de cada de projecto na tabela teste_logs

require_once('phpcassa/connection.php');
require_once('phpcassa/columnfamily.php');

$conn = new Connection('tolmai');

$column_family = new ColumnFamily($conn, 'tm');
$logs = new ColumnFamily($conn, 'teste_logs');

$numproj = 0;


		$index = $column_family->get_range($key_start='', $key_finish='',1000000);

		foreach($index as $key => $result) {
			$perc_rand1=rand(0,100);
			$perc_rand2=rand(0,100);
			$perc_rand3=rand(0,100);
			$perc_rand4=rand(0,100);
			$logs->insert($key, array('language1' => $result['tm_language_P'], 'plang1' => $perc_rand1, 'language2' => $result['tm_language_S'], 'plang2' => $perc_rand2, 'language3' => $result['tm_language_S'], 'plang3' => $perc_rand3, 'language4' => $result['tm_language_T'], 'plang4' => $perc_rand4));
			
			$numproj++;
		}
		
	
print_r("<br>");

echo("<p>Numero de projectos inseridos: $numproj\n\n</p>");

?>
