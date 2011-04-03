<?php

//Editar aqui os nossos dados conforme configurações da sua conta.
$config_method = 'GET';
$config_userpass = 'username:password';
$config_headers[] = 'Accept: application/xml';
$config_address = 'http://subdomain.unfuddle.com/api/v1/';
$config_datasource = 'projects.xml';

//Aqui colocamos o CURL para obter os dados do Unfuddle
$chandle = curl_init();
curl_setopt($chandle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chandle, CURLOPT_URL, $config_address . $config_datasource);
curl_setopt($chandle, CURLOPT_HTTPHEADER, $config_headers);
curl_setopt($chandle, CURLOPT_USERPWD, $config_userpass);
curl_setopt($chandle, CURLOPT_CUSTOMREQUEST, $config_method);
$output = curl_exec($chandle);
curl_close($chandle);

//XML em PHP é simples de usar com SimpleXML

$xml = new SimpleXMLElement($output);

foreach ($xml->project as $project) {
  echo '(ID: ' . $project->{'id'} . ') - ' . $project->{'title'};
  echo '-------------------------------------------------------';
  echo $project->{'description'};
  echo '-------------------------------------------------------';
  echo 'Repos: ' . $project->{'repo-name'};
  echo 'Created: ' . $project->{'created-at'};
  echo 'Last mod: ' . $project->{'updated-at'};
  echo '-------------------------------------------------------';
}
?>

// Here we set up CURL to grab the data from Unfuddle
//curl -i -u username:password -X GET \-H 'Accept: application/xml'\'http://mysubdomain.unfuddle.com/api/v1/projects/ZZZZ.xml'
//$url = "http://code.google.com/hosting/search?q=label:Java";