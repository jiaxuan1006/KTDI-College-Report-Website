<?php
session_start();

// if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
// header("Location: index.php");   //send user to login page
	

?>
	<html>
	<head>
        <title>New Password</title>
        <!-- Link to css file -->
		<link rel="stylesheet" href="layout.css">
    <head>
	<body>
	<div class="form">
	<h1>New Password</h1>
    <hr><br/>

<?php
        $email = $_GET['email'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
		 
        require ("config.php");
        
        // Retrieve data from database
        $sql="SELECT * FROM user WHERE email='$email'"; 
        $result = mysqli_query($conn, $sql);
        $rows=mysqli_fetch_assoc($result);

        $count=mysqli_num_rows($result);

        if($count==1){
?>

<form name="form" method="post" action="reset-password-process.php?email=<?php echo $email . "&name=" . $name . "&contact=" .$contact;?>" onsubmit="return(validate_profile());">
<table border="0" cellspacing="5" cellpadding="0" class="table">
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" size="50" value="<?php echo $email;?>" disabled></td>
    </tr>

    <tr>
        <td>Name</td>
        <td><input type="text" name="name" size="50" value="<?php echo $name;?>" disabled></td>
    </tr>
	<tr>
		<td>Contact</td>
		<td><input type="text" name="contact" size="10" value="<?php echo $contact;?>" disabled></td>
	</tr>
    <tr>
        <td>Enter New Password</td>
        <td><input type="password" name="password1" size="50" value=""></td>
    </tr>

    <tr>
        <td>Re-Enter New Password</td>
        <td><input type="password" name="password2" size="50" value=""></td>
    </tr>
   
	<tr>
		<td align="left"><br/><button type="button" name="Back" onclick="document.location='index.php'">Back</td>
		<td align="right"><br/><input type="submit" name="Submit" value="Confirm" class="button"></td>
	</tr>

</table>
</form>
</div>


<script src="js/validate.js"></script>
</body>
</html>

<?php
        }

        mysqli_close($conn);
?>