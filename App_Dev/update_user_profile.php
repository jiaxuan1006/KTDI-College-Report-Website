<?php
session_start();

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
	header("Location: index.php");   //send user to login page
 
		 $id = $_GET["id"];
	     $name = $_POST["name"];
	     $gender = $_POST["gender"];
	     $contact = $_POST["contact"];
		 $email = $_POST["email"];
 		 
	     require ("config.php");

	     $sql = "UPDATE user SET name = '$name', gender = '$gender', 
                 contact = '$contact', email = '$email' WHERE id = '$id'" ;

	     if (mysqli_query($conn, $sql)) {
			if($_SESSION['LEVEL'] == 0)
			{
				echo '<script>alert("Successfully save the changes!")</script>';
				header("Location: update_admin_profile_form.php?id=$_SESSION[USERID]");
				exit();
			}
			else if($_SESSION['LEVEL'] == 1)
			{
				echo '<script>alert("Successfully save the changes!")</script>';
				header("Location: update_resident_profile_form.php?id=$_SESSION[USERID]");
				exit();
			}
		} else {
			if($_SESSION['LEVEL'] == 0)
			{
				echo '<script>alert("Error: ' . $sql . '<br>' . mysqli_error($conn) . '")</script>';
				header("Location: update_admin_profile_form.php?id=$_SESSION[USERID]");
				exit();
			}
			else if($_SESSION['LEVEL'] == 1)
			{
				echo '<script>alert("Error: ' . $sql . '<br>' . mysqli_error($conn) . '")</script>';
				header("Location: update_resident_profile_form.php?id=$_SESSION[USERID]");
				exit();
			}
		}
          mysqli_close($conn);
	?>
	</div>