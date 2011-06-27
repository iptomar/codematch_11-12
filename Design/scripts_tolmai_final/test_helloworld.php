<?php
require_once('get_helloworld.php');
function hello($linguagem){
$linguagem = $_GET['dat'];
$total = get_hello($linguagem);
$arr = array();
foreach ($total as $key => $value){
  $arr[$key]=$value;
 }
echo json_encode($arr);
}
$linguagem = $_GET['dat'];

hello($linguagem);
//hello("C++");
?>
