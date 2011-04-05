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


$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteGH . $pages;

$session = curl_init($fullURL);

curl_setopt($session, CURLOPT_HEADER, false); 

curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

$resultsJson = curl_exec($session); 

curl_close($session);

$results = json_decode($resultsJson);

foreach ($results->{'ysearchresponse'}->{'resultset_web'} as $result) 

{

echo "<h3><a href=\"{$result->{'clickurl'}}\">{$result->{'title'}}</a></h3>\n";

echo "<p>{$result->{'abstract'}}</p>\n";

}

	
	
?>