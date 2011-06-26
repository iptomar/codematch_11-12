<?php
 include ("database_data.php");
 $get_details = get_details('190000');
 foreach($get_details as $project => $owner) {
    $ch = @curl_init(); //inicia uma nova sessao
    curl_setopt($ch, CURLOPT_URL, "http://sourceforge.net/api/project/name/$project/json");  //faz a pesquisa contida no url
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
    $page = curl_exec($ch);	//executa as opcoes definidas
    curl_close($ch);	//encerra sessao
	$sourceforge_json = json_decode($page); //descodifica string JSON
    if(isset($sourceforge_json->Project->SVNRepository->location)){
		$string_link = $sourceforge_json->Project->SVNRepository->location;
	}
    print_r($string_link);
}

?>