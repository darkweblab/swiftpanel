<?php
include 'config.php';

if(isset($_GET['create'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$check = mysql_query("SELECT * FROM client WHERE email='".$email."'");
	if(mysql_num_rows($check)>=1){
		header("Location: register.php?used");
	} else {
		$go = mysql_query("INSERT INTO client SET firstname='".$firstname."', lastname='".$lastname."', email='".$email."', password='".$password."', status='Active'");
		
		if($go == TRUE){
			header("Location: register.php?done");
		}
	}
}

if(isset($_GET['used'])){
	$msg = "<br /><font class='error'>Email already used!</font><br /><br />";
}
if(isset($_GET['done'])){
	$msg = "<br /><font class='succ'>Successfully registered - <a href='login.php'>LOGIN</a>!</font><br /><br />";
}
?><!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Register - OnFire-Gpanel</title>
		<link rel="stylesheet" type="text/css" href="templates/default/style.css" />
	</head>
<body>





<center>
<div style="margin-top:130px;"></div>
<div class="login_t1">
<br>
<font color="e20000" size="4px">CLIENT REGISTER</font>
<br>
<br>
	<?php echo $msg;?>
	<form action="register.php?create" method="POST">
		<table cellspacing="1" cellpadding="5" border="0">
			<tr>
				<td class="left">Firstname</td>
				<td><input type="text" name="firstname" class="email" required /></td>
			</tr><tr>
				<td class="left">Lastname</td>
				<td><input type="text" name="lastname" class="email" required /></td>
			</tr><tr>
				<td class="left">Email</td>
				<td><input type="email" name="email" class="email" required /></td>
			</tr><tr>
				<td class="left">Password</td>
				<td><input type="password" name="password" class="password" required /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn_login" value="Register" /></td>
			</tr>
		</table>
	<form>
<br><br>
</div>
	
<a href="login.php"><div class="reg1">LOGIN PAGE</div></a>
</center>

</body>
</html>