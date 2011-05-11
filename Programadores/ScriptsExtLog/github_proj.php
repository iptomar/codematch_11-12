<?php

$ch = @curl_init(); //inicia uma nova sessao
curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/commits/list/madrobby/zepto/master?page=1");  //faz a pesquisa contida no url
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
$page = curl_exec($ch);	//executa as opcoes definidas
curl_close($ch);	//encerra sessao
$github_json = json_decode($page); //descodifica string JSON
$github_tree_sha = $github_json->commits[0]->tree;

echo "<pre>";
print_r($github_tree_sha);
echo "</pre>";


$ch = @curl_init(); //inicia uma nova sessao
curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/blob/full/madrobby/zepto/$github_tree_sha");  //faz a pesquisa contida no url
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1'); //utiliza Googlebot 2.1
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);	//define o retorno como string
$page = curl_exec($ch);	//executa as opcoes definidas
curl_close($ch);	//encerra sessao
$github_json = json_decode($page); //descodifica string JSON

echo "<pre>";
print_r($github_json);
echo "</pre>";


foreach($github_json->blobs as $ext){
$extensao = substr($ext->name, strrpos($ext->name, '.'), strlen($ext->name));
print_r($extensao);
$os = array(".rdoc" => "Documento", ".js" => "JavaScript", ".jar" => "Java", ".html" => "Páginas HTML");
//if (in_array($extensao, $os)) {
    if(isset($os[$extensao])) {
        echo '=> ';
        echo $os[$extensao];
        echo '<br />';
    }  else {echo '=> outros';
        echo '<br />';
    }
    }
//}

?>