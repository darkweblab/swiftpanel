<html>
<head>
	<title>Emri u Nderrua</title>
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
$field_name = $_POST['name'];

// update data in mysql database 
$sql="UPDATE $tbl_name SET name='$field_name' WHERE serverid='$field_serverid'";

$result=mysql_query($sql);
mysql_query($query);
// if successfully updated. 
if($result){
echo "<br />";
echo "<br />";
echo "<center><div class=\"success\">Ju e nd&euml;rruat emrin e serverit tuaj, <input type='button' onClick='history.go(-1);' value='Kthehuni Mbrapa' /></div></center>";
echo "<br />";
echo "<center><div class=\"success\">Emri i Serverit Tuaj Tani Eshte: (<b>$field_name</b>).</div></center>";
}

else {
echo "ERROR";
}
?>