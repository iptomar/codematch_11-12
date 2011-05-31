<?php
	//lista os  projectos do sourceforge activos, do 1 projecto a um numero detrminado por nos...
	//o ideial era apanhar o numero do ultimo projecto no ssourceforge criado para ser um numero certo, nao um numero aleatorio
	//o exemplo abaixo lista os projecto activos dos primeiros 800 projectos criados
	$aux=0;//variavel para mostrar quantos projectos estao activos
	$total=20;
	$pp ="programming-languages";
	for($teste= 1;$teste<=$total;$teste++)
	{
	 	if( !ini_get('safe_mode') )
		{
            set_time_limit(180);
        }
		$ch = @curl_init();
		$url="http://sourceforge.net/api/project/id/$teste/json";
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$page = curl_exec( $ch);
		curl_close($ch);
		//descodifica uma string json
		$json = json_decode($page);	
			//se nao exitir projecto nao apresenta
			if($json->Project->id != null)			
				{
				//apresenta alguns dados do projecto
					print_r("<b>ID: </b>" .($json->Project->id)."<br>");
					print_r("<b>Nome: </b>" .($json->Project->name)."<br>");
					print_r("<b>Ranking: </b>" .($json->Project->ranking)."<br>");
					print_r("<b>Languages: </b>" .($json->Project->$pp)."<br><br>");
					$aux++;
				}
	}
	echo "Total de projectos activos: " .$aux, " em " .$total;
?>