<title>FTP Password Changer</title>
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
	$field_serverid = $_POST['serverid'];
	$field_serverip = $_POST['serverip'];
	$field_serveruser = $_POST['serveruser'];
	$field_serverpassword = $_POST['serverpassword'];
?>

<?php
$conn = ssh2_connect($field_serverip, 22);
ssh2_auth_password($conn, 'root', 'ermali');

$stream = ssh2_exec($conn, "echo -e '". $field_serverpassword ."\n". $field_serverpassword ."' | passwd '". $field_serveruser ."'");
?>
<?php

mysql_connect("localhost","gpanel","gpanel1") or die ("Could not connect.");
mysql_select_db("gpanel") or die ("Failed to connect to database!");
$tbl_name = "server";

$field_serverid = $_POST['serverid'];

// update data in mysql database 
$sql="UPDATE $tbl_name SET password='$field_serverpassword' WHERE serverid='$field_serverid'";

$result=mysql_query($sql);
mysql_query($query);
// if successfully updated. 
if($result){
echo "<br />";
        echo "<center><div class=\"success\">Ju e nd&euml;rruat passin e FTP-s suaj.<input type='button' onClick='history.go(-1);' value='Kthehuni Mbrapa' /></div>";
echo "<br />";
echo "<center><div class=\"success\">Passwordi juaj i ri eshte: (<b>$field_serverpassword</b>) . </div>";
}

else {
echo "ERROR";
}
?>