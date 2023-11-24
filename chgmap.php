<title>Map Changer </title>
<html>
<head>
	<title>Mapa u nderrua</title>
	<link rel="stylesheet" type="text/css" href="templates/default/style.css" />
</head>
	<style type="text/css">
	.success {
    background-color: #5CD783;
    border: 1px solid #5CD783;
    padding: 10px;
    color: #fff;
    width: 400px;
    border-radius: 4px;
    -moz-border-radius: 4px;
	font-family:Verdana;
	font-size:14px;
	}
	</style>
</html>
<?php

mysql_connect("localhost","gpanel","gpanel1") or die ("Could not connect.");
mysql_select_db("gpanel") or die ("Failed to connect to database!");
$tbl_name = "server";

$field_serverid = $_POST['serverid'];
$field_cfg3 = $_POST['cfg3'];

// update data in mysql database 
$sql="UPDATE $tbl_name SET cfg3='$field_cfg3' WHERE serverid='$field_serverid'";

$result=mysql_query($sql);
mysql_query($query);
// if successfully updated. 
if($result){
echo "<br />";
echo "<br />";
echo "<center><div class=\"success\">Ju e nd&euml;rruat map&euml;n n&euml;, (<b>$field_cfg3</b>).</div>";
echo "<br />";
echo "<input type=\"button\" class=\"buttonblue\" value=\"Kthehu\" onClick=\"window.location=('serversummary.php?id=$field_serverid');\" /></center>";
}

else {
echo "ERROR";
}
?>