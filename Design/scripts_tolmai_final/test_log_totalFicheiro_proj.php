<?php
//devolve o número total de ficheiros de um projecto
//para a pasta functions
require_once('log_totalFicheiro_proj.php');
function total_Ficheiros($proj){
$proj = $_GET['dat'];
//$repo = "Github";
$total = logs($proj);

 echo json_encode($total);
}
$proj = $_GET['dat'];
//$repo = "Github";
total_Ficheiros($proj);

?>
