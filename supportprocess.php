<?php
$servername = "localhost";
$username = "gpanel";
$password = "gpanel1";
$dbname = "gpanel";

	$field_clientid = $_POST['clientid'];
	$field_user = $_POST['user'];
	$field_date = $_POST['date'];
	$field_message = $_POST['message'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tickets SET username='".$field_user."', clientid='".$field_clientid."', date='".$field_date."', message='".$field_message."'";

if (mysqli_query($conn, $sql)) {
	header("Location: support.php?sent");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>