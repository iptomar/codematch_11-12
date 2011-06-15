<?php
//this function count the number of projects per repository
//input: repository <string>
//output: null (string) if dont find project
//        data if hit

require_once('get_totalProjectPorRepo.php');

function test_total($repo){
//$repo1 = "Github";
$repo1 = $_GET['dat'];
$repo2 = total($repo1);
echo json_encode($repo2);
}
$repo1 = $_GET['dat'];

test_total($repo1);
?>