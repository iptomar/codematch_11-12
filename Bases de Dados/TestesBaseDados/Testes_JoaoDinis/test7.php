<?php
	//Joao dinis
	//Insere projectos que tenham as letras do array
	//faz a percentagem das linguagens
	//e faz os gets dos projectos isneridos.
	require_once('phpcassa/connection.php');
	require_once('phpcassa/columnfamily.php');
	$conn = new Connection('Keyspace1');
	$column_family = new ColumnFamily($conn, 'starndard2');
	//pagina do api
	$num=0;$js=0;$j=0;$p=0;$r=0;$cs=0;$c=0;$php=0;$per=0;$others=0;
	// for($cont=0;$cont<26;$cont++)
	// {
	 	$abc=array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$request = 'http://github.com/api/v2/json/repos/search/codematch';//.$abc[$cont];
		//le o ficheiro para uma string
		$response = file_get_contents($request);		
		//descodifica uma string json
		$jsonobj = json_decode($response);
		//Imprime os resultados
	
		foreach($jsonobj->repositories as $arg) { 
			$column_family->insert($num, array('NomeProj' => $arg->name));
			$column_family->insert($num, array('AutorProj' => $arg->username));
			$column_family->insert($num, array('CriaProj' => $arg->created_at));
			$column_family->insert($num, array('language' => $arg->language));	
			switch($arg->language)
			{
				case "JavaScript":  $js++; break; 
				case "Java":  $j++; break; 
				case "Python":  $p++; break; 
				case "Ruby":  $r++; break; 
				case "C#":  $cs++; break;
				case "C":  $c++; break; 
				case "PHP":  $php++; break; 
				case "Perl":  $per++; break;
				default: $others++; break;
			}
			 $num++;
	// }	
	}
	for($i=0;$i<$num;$i++)
	{
		$re = $column_family->get($i);
		echo "Projecto nº".$i;
		print_r("<br>");
		print_r($re);
		print_r("<br>");
	}
	$js=$js/$num*100;
	$j=$j/$num*100;
	$p=$p/$num*100;
	$r=$r/$num*100;
	$cs=$cs/$num*100;
	$c=$c/$num*100;
	$php=$php/$num*100;
	$per=$per/$num*100;
	$others=$others/$num*100;
	print_r("<br>");
	echo "Percentagem de JavaScript: ".$js."%";
	print_r("<br>");
	echo "Percentagem de Java: ".$j."%";
	print_r("<br>");
	echo "Percentagem de Python: ".$p."%";
	print_r("<br>");
	echo "Percentagem de Ruby: ".$r."%";
	print_r("<br>");
	echo "Percentagem de C#: ".$cs."%";
	print_r("<br>");
	echo "Percentagem de C: ".$c."%";
	print_r("<br>");
	echo "Percentagem de PHP: ".$php."%";
	print_r("<br>");
	echo "Percentagem de Perl: ".$per."%";
	print_r("<br>");
	echo "Outros: ".$others."%";
	print_r("<br>");
?>