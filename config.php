<?php
if(!mysql_connect("localhost","gpanel","gpanel1")){
	die('Cannot connect to database! --> '.mysql_error());
}
if(!mysql_select_db("gpanel")){
	die('Cannot switch to database! --> '.mysql_error());
}

$date = date("d/m/Y");
$websitename = 'www.onfire-hosting.co';

?>