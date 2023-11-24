<title>Admin ADD</title>
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
	$field_serverip = $_POST['serverip'];
	$field_serveruser = $_POST['serveruser'];
	$field_serverpassword = $_POST['serverpassword'];
	
	$field_nick = $_POST['nick'];
	$field_pw = $_POST['pw'];
	$field_access = $_POST['access'];
	$field_comments = $_POST['comments'];
$admin = (PHP_EOL . '"'.$field_nick.'" "'.$field_pw.'" "'.$field_access.'" "ab"                ;'.$field_comments.'');
?>
<?php
$conn = ssh2_connect($field_serverip, 22);
ssh2_auth_password($conn, $field_serveruser, $field_serverpassword);

$sftp = ssh2_sftp($conn);

$stream = fopen("ssh2.sftp://$sftp/home/$field_serveruser/cstrike/addons/amxmodx/configs/users.ini", "a+");
 fseek($stream, 0, SEEK_END);
 fwrite($stream, $admin);
 fclose($stream);
 
 if(fwrite == TRUE) {
        echo "<center><div class=\"success\">Ju sapo shtuat nje admin ne serverin tuaj. <input type='button' onClick='history.go(-1);' value='Kthehuni Mbrapa' /></div>";
        echo "<br /";
        echo "<center><div class=\"success\">Admin Nick: (<b>$field_nick</b>)</div>";
        echo "<br /";
	echo "<center><div class=\"success\">Admin Pass: (<b>$field_pw</b>)</div>";
        echo "<br /";
	echo "<center><div class=\"success\">Admin Acc: (<b>$field_access</b>)</div>";
        echo "<br /";
	echo "<center><div class=\"success\">Admin Comm: (<b>$field_comments</b>)</div>";
 } else {
	 echo "Error, admin not added!";
 }

?>