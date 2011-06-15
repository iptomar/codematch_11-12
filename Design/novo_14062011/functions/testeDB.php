<?php

require_once('../phpcassa/connection.php');
require_once('../phpcassa/columnfamily.php');

include_once('../phpcassa/uuid.php');

include_once('insert_DB.php');
include_once('search_lang_proj.php');
include_once('search_project_detail.php');
include_once('search_repo.php');
include_once('search_author.php');
include_once('search_auth_proj.php');
include_once('search_lang_single_proj.php');
include_once('search_part_project.php');


$lang = array("C","VB");
$authr = array("X","Y","aaaaa","aaaaab");

$url = array("aa","aaab");
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

  //insert("kill",'dhgfskhj gfdjkgfhd gf,s',"www.lauchpad.com","Github","20000000","20000000","www.www.www",$lang,"aaaaab");
// insert("kill",'dhgfskhj gfdjkgfhd gf,s',"www.github.com","Github","20000000","20000000","www.www.www",$lang,$authr[3]);
 //$column = $column_fam -> get("kill");
//print_r($column);
// $repository_check = array("Sourceforge","Github");

 //insert("tt",'dhgfskhj gfdjkgfhd gf,s',"www.lauchpad.com","Launchpad","20000000","20000000","www.www.www",$lang,"aaa");
 //insert("cat",'dhgfskhj gfdjkgfhd gf,s',"www.lauchpad.com","Launchpad","20000000","20000000","www.www.www",$lang,$authr);
 //insert("cat",'dhgfskhj gfdjkgfhd gf,s',"www.sourceforge.com","Sourceforge","20000000","20000000","www.www.www",$lang,$url);
// insert("tt",'dhgfskhj gfdjkgfhd gf,s',"www.github.com","Github","20000000","20000000","www.www.www",$lang,"aaaaaaacjfdf");
 //insert("testes",'dhgfskhj gfdjkgfhd gf,s',"www.lauchpad.com","Github","20000000","20000000","www.www.www",$lang,"aaa");
 $conf = array();
 $pos = 0;
 $presence = array();
  //$column = $column_fam -> get("tt");
  //print_r($column);
$pesq = search_author('aa');

 foreach ($pesq as $key=>$value) {
	 //write hits on array
	 $conf[$pos] = $value;	
	 
	 $pos++;
	 }
	 
print_r($conf[0]."\n");

// $column_auth = new ColumnFamily($conn,'author');
// $pdif = $column_auth -> get_range("","",100000);
// $tam = 0;
// foreach ($pdif as $ch => $va){
	// //$tam++;
	// print($ch."\n");
	// print_r($va);
// }

//print($tam."\n");
$hit = search_auth_proj("cat");
Print_r($hit);

$l = search_auth_single_proj("cat");
Print_r($l);

$k= search_part_proj("te");
print_r($k);
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