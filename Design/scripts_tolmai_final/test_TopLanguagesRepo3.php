<?php
//este ficheiro retorna as tres linguagens mais populares de um repositorio
require_once('get_toplangRepoTemp.php');
function dados_top_repo_3($repo1){
$repo1 = $_GET['dat'];
//$repo1 = "Github";


$lista = toplog($repo1);

$lista1 = json_decode($lista);
//transforma dados em array
$list = objectToArr($lista1);

$listaTop = array_slice($list, 0, 3);

$count = 0;
 $arr = array();
 /*
 for(int i = 0; i < 3; i++)
 {
	$val = $listaTop[$count];
	$arr[$count]=array($val);
	count++;
 
 }
 */
 
 
 
foreach ($listaTop as $key => $value){
 //$value = round(($value/$total)*100,2);
 //echo "['".$key."', ".$value."],";
 $arr[$count]=array($key);
 $count++;
 }
 echo json_encode($arr);
 
 
}

//função q transforma objecto stdrclass em array
	function objectToArr($d) {
                if (is_object($d)) {
                        // Gets the properties of the given object
                        // with get_object_vars function
                        $d = get_object_vars($d);
                }
				
				return $d;
}
$repo = $_GET['dat'];
//$repo = "Github";
dados_top_repo_3($repo);

?>
