<?php
//account key for yahoo api's 
$yahooAPIKey = "po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-";
//url of yahoo api
$YahooSearchAPI = "http://boss.yahooapis.com/ysearch/web/v1/";
//url of the key for yahoo api
$UrlAppid = "?appid=" . $yahooAPIKey;
//format of the response from yahoo api
$format = "&format=json";
//declare the domain where the search have to be work
$SiteGH = "&sites=github.com";
$SiteSF = "&sites=sourceforge.net";
$SiteBB = "&sites=bitbucket.org";
$SiteLP = "&sites=launchpad.net";
$SiteGG = "&sites=code.google.com";
//permit to transfer the word "php" for the other resourches
$query = urlencode("php");
//inicialize with 20 searchs and one page
$pages ="&start=0&count=20";
//search in the github server
echo"###############GITHUB##################";
//full url for research
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteGH . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
//show the results from search made
print_r($results);
echo "</pre>";
echo "<br />";

//search in the sourceforge server
echo"###############SOURCEFORGE##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteSF . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
print_r($results);
echo "</pre>";
echo "<br />";

//search in the bitbucket server
echo"###############BITBUCKET##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteBB . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
print_r($results);
echo "</pre>";
echo "<br />";

//search in the launchpad server
echo"###############LAUNCHPAD##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteLP . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
print_r($results);
echo "</pre>";
echo "<br />";

//search in the google server
echo"###############GOOGLE##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteGG . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
print_r($results);
echo "</pre>";
echo "<br />";

/*foreach ($results->{'ysearchresponse'}->{'resultset_web'} as $result) 

{

echo "<h3><a href=\"{$result->{'clickurl'}}\">{$result->{'title'}}</a></h3>\n";

echo "<p>{$result->{'abstract'}}</p>\n";

}

*/	
	
?>