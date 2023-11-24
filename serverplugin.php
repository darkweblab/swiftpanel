<?php
	$field_serverip = $_POST['serverip'];
	$field_serveruser = $_POST['serveruser'];
	$field_serverpassword = $_POST['serverpassword'];
	
	$field_pname = $_POST['pname'];
	$field_comments = $_POST['comments'];
$plugin = (PHP_EOL . ''.$field_pname.'                ;'.$field_comments.'');
?>
<?php
$conn = ssh2_connect($field_serverip, 22);
ssh2_auth_password($conn, $field_serveruser, $field_serverpassword);

$sftp = ssh2_sftp($conn);

$stream = fopen("ssh2.sftp://$sftp/home/$field_serveruser/cstrike/addons/amxmodx/configs/plugins.ini", "a+");
 fseek($stream, 0, SEEK_END);
 fwrite($stream, $plugin);
 fclose($stream);
 
 if(fwrite == TRUE) {
	echo "Plugin installed &bull; <input type='button' onClick='history.go(-1);' value='Back' />";
 } else {
	 echo "Error, plugin not installed!";
 }

?>