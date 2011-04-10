<?php
include "launchpad.php"; //include da api launchpad
include "github.php"; //include da api github
//include "sourceforge.php"; //include da api sourceforge
//require_once('phpcassa/connection.php');
//require_once('phpcassa/columnfamily.php');

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



function get_yahoo_launchpad($start,$count){
//inicialize with 20 searchs and one page
$pages ="&start=".$start."&count=".$count."";
$query = urlencode("htttp://launchpad.net/");
$fullURL = $YahooSearchAPI . $query . $UrlAppid . $format . $SiteLP . $pages;
$session = curl_init($fullURL);
curl_setopt($session, CURLOPT_HEADER, false); 
curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 
$resultsJson = curl_exec($session); 
curl_close($session);
$yahoo_json = json_decode($resultsJson);
print_r($yahoo_json);
$yahoo_array = array();
foreach($yahoo_json->{'ysearchresponse'}->{'resultset_web'} as $arg) {
	//retira o nome do utilizador atraves do URL
	preg_match("/https:\/\/launchpad.net\/([A-Za-z0-9-_]*).*/", $arg->{'Url'}, $match);
	if (!empty($match[1])) {
		//match[1] = utilizador
		array_push($yahoo_array, get_project_launchpad($match[1])); 
	}
}
unset($yahoo_array[0]);
return (array)$yahoo_array;
}

$yahoo_array = get_yahoo_launchpad(0,20);
foreach($yahoo_array as $arg) {
	list ($name_project, $owner, $language, $created_date, $logo) = $arg;
	print_r("<b>Project:</b> ".$name_project."<br>");
	print_r("<b>Source:</b> Launchpad<br>");
	print_r("<b>Owner:</b> ".$owner."<br>");
	print_r("<b>Languages:</b> ".$language."<br>");
	print_r("<b>Date Created:</b> ".$created_date."<br>");
	print_r("<b>Logo:</b> <img src='".$logo."'><br><hr><br>");
}
?>