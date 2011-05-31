<?php

//Pesquisa de projectos no Google Code por linguagem de programacao
//Usando o url abaixo definido conseguimos listar os projectos existentes nesse server
//A pesquisa e definida pelo parametro 'label:' seguido da linguagem de programacao
//Devolve uma listagem de pesquisa como o Google normal indexada e paginada.

$url = "http://code.google.com/hosting/search?q=label:Java";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);  
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $body = curl_exec($ch);
    curl_close($ch);
    print_r($body);

?>

//link para a API/Json - https://ajax.googleapis.com/ajax/services/search/web