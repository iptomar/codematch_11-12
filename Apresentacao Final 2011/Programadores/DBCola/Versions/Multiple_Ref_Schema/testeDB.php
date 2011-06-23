<?php

require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

include_once('insert_DB.php');
include_once('search_lang_proj.php');
include_once('search_project_detail.php');
include_once('search_repo.php');
include_once('search_author.php');

$lang = array("C","VB");
$authr = array("X","Y");
$url = "www.launchpad.com";
//insert('Firefox','wwww.github.www','Github','20100511','20112020','ewwww.www',$lang,$authr);
//insert('Firefox','wwww.launchpad.www','Launchpad','20100511','20112020','ewwww.www',$lang,$authr);
//insert('Firefox','wwww.sourceforge.www','Sourceforge','20100511','20112020','ewwww.www',$lang,$authr);
$conn = new Connection('testes_DBCola');

//selects language database
$column_fam= new ColumnFamily($conn,'projects');
$column_family = new ColumnFamily($conn,'presence');
//$column_fam -> insert("Ubuntu",array(CassandraUtil::uuid1() => array('source' => "wwww.github.www",'date_c'=> "20100511", 'date_l' =>"20112020",'logo' =>"ewwww.www")));
//$column_fam -> insert("Ubuntu",array(CassandraUtil::uuid1() => array('source' => "wwww.sourceforge.www",'date_c'=> "20100511", 'date_l' =>"20112020",'logo' =>"ewwww.www")));
//$column_fam -> insert("Ubuntu",array(CassandraUtil::uuid1() => array('source' => "wwww.github.www",'date_c'=> "20100511", 'date_l' =>"20112020",'logo' =>"ewwww.www")));
//$column_fam -> insert("Firefox",array(CassandraUtil::uuid1() => array('nome' => 'wwww.github.www')));
//$column_family -> insert('Firefox',array('repo_S' => 'sourceforge', 'repo_G' => 'github' ));
//$column_family -> insert('Firefox',array('repo_L' => 'Null' ));

 insert("q","www.sourceforge.com","Github","20000000","20000000","www.www.www",$lang,$authr);
 $column = $column_fam -> get("q");
print_r($column);
// $repository_check = array("Sourceforge","Github");

// //array to capture UUID keys
// $conf = array();
// //start array position
// $pos = 0;

// //capture repository presence
// $presence = array();

// //fetch UUID keys from a given project
// foreach ($rows as $key=>$value) {
	// //write hits on array
	// $conf[$pos] = $key;	
	// //explode string by dot - SuperColumn -> 'source' => value ("www.example.pt") = [0] value www;[1] value examples;[2] value pt
	// $temp = explode('.',$value['source']);
	// //write on presence - repository
	// $presence[$pos] = $temp[1];
	// //increment position
	// $pos++;
// }

//1ª letra grande repositorio

// $temp = explode('.',$url);
// $presence = ucfirst($temp[1]);
// print($presence);
// print("\n");
// $search = $column_family -> get('Firefox');
// $x = $search['repo_S'];
// $y = $search['repo_G'];
// $z = $search['repo_L'];


// if($presence == $x ) {print("Sourceforge allready has it!");
// }elseif($presence == $y ) {print("Github allready has it!");
// }elseif($presence == $z)  {print("Launchpad allready has it!");}
// else {
// print("No one has it!");
// }
// print("\n");
//print_r($search);

	


	

// if (in_array("Githubxxxxx", $repository_check)) {
    // print("True");
// }


//print_r($conf);



//print_r($presence);
//$pos=0;


?>