<?php
$yahooAPIKey = "po6V4W7IkY2t6hn8Ab51nFT_HKtEocokU.E-";

$YahooSearchAPI = "http://boss.yahooapis.com/ysearch/web/v1/";

$UrlAppid = "?appid=" . $yahooAPIKey;

$format = "&format=json";

$SiteGH = "&sites=github.com";

$SiteSF = "&sites=sourceforge.net";

$SiteBB = "&sites=bitbucket.org";

$SiteLP = "&sites=launchpad.net";

$SiteGG = "&sites=code.google.com";

$query = urlencode("php");

$pages ="&start=0&count=20";

echo"###############GITHUB##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteGH . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
//mostra array
print_r($results);
echo "</pre>";
echo "<br />";


echo"###############SOURCEFORGE##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteSF . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
//mostra array
print_r($results);
echo "</pre>";
echo "<br />";

echo"###############BITBUCKET##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteBB . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
//mostra array
print_r($results);
echo "</pre>";
echo "<br />";

echo"###############LAUNCHPAD##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteLP . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
//mostra array
print_r($results);
echo "</pre>";
echo "<br />";

echo"###############GOOGLE##################";
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteGG . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

echo "<pre>";
//mostra array
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