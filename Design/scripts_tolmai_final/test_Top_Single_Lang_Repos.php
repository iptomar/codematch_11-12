<?php
//para a pasta functions
require_once('get_toplangRepoTemp.php');
function dados_top_Repo($lang){
$lang = $_GET['dat'];
//$repo = "Github";
//dados da função
$lista = toplog("Github");
//descodifica os dados que estao em json
$lista1 = json_decode($lista);
//transforma dados em array
$list = objectToArr($lista1);

//retira primeiros 10 resultados
//$listaTop = array_slice($list, 0, 1000);
$arr = array();
$total = 0;
//calcula numero total de projectos
foreach ($list as $key => $value)
{
 $total += $value;
 }
$count = 0;
 
 //calcula % de cada linguagem
foreach ($list as $key => $value){
 $value = round(($value/$total)*100,2);
 //echo "['".$key."', ".$value."],";
  
  if($key == $lang)
  {
  $resto = 100 - $value;
  $arr[$count]=array( $key , $value );
  $arr[$count + 1]=array( "Outras" , $resto );
  }
  
 }
 //retorna linguagens e suas percentagens
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


$lang = $_GET['dat'];
//$repo = "Github";
dados_top_Repo($lang);

?>
