<?php
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://sourceforge.net/api/user/username/lukecrouch/json" );
	curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);
	echo "<br>Dados do Utilizador<br>";
	print_r("<b>Nome: </b>" .($json->User->name)."<br>");
	print_r("<b>username: </b>" .($json->User->username)."<br>");
	print_r("<b>language: </b>" .($json->User->language)."<br>");
	print_r("<br><br>");
	echo "Total Projectos: ".count($json->User->projects);
	print_r("<br><br>");
	echo "<br>Projectos:<br><br>";	
foreach($json->User->projects as $arg) {
	print_r("<b>id: </b>".$arg->id."<br>");
	print_r("<b>Name: </b>".$arg->name."<br>");
	print_r("<b>unix_name: </b>".$arg->unix_name."<br>");
	print_r("<b>role: </b>".$arg->role."<br>");
	print_r("<br><br>");
}
?>