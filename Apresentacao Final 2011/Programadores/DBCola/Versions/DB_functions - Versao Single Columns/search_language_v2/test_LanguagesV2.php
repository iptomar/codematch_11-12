<?php


require ("get_topLanguagesV2.php");

$resultado =get_lang('JAVA');

foreach ($resultado as $key=>$value) {

echo "Projecto: $key <br/>";


foreach ($value as $iKey => $iValue) {
if ($iKey == 'tm_author'){
echo "Author: $iValue <br/>";
}
if ($iKey == 'tm_date_c'){
echo "Date_c: $iValue <br/>";
}
if ($iKey == 'tm_date_l'){
echo "Date_l: $iValue <br/>";
}
if ($iKey == 'tm_fullname'){
echo "Fullname: $iValue <br/>";
}
if ($iKey == 'tm_language_P'){
echo "Lnguage_P: $iValue <br/>";
}
if ($iKey == 'tm_language_S'){
echo "language_S: $iValue <br/>";
}
if ($iKey == 'tm_language_T'){
echo "language_T: $iValue <br/>";
}
if ($iKey == 'tm_logo'){
echo "logo: $iValue <br/>";
}
if ($iKey == 'tm_repository'){
echo "repository: $iValue <br/>";
}

}
echo "------------------------------------------<br /><br />";}


?>