<?php 
session_start();

//Retrieved data from form
$username = $_POST['username'];
$fname = $_POST['fname'];
$femail = $_POST['femail'];
$fpwd = $_POST['fpwd'];
$hash = password_hash($fpwd, PASSWORD_DEFAULT);
$id = $_POST['id'];

require ("config.php");


	$sql = "INSERT INTO user (id, username, name, password, email, level)
	VALUES ('$id', '$username', '$fname', '$fpwd', '$femail', 1);";
	
	if (mysqli_query($conn, $sql)) {
		header("Location: resident-main.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
	?>