<?php 
session_start(); // Start up your PHP Session
 
require('config.php');

// username and password sent from form
$myusername=$_POST["fname"];
$mypassword=$_POST["fpwd"];

$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);  // index in the "user" database

$user_name=$rows["username"];
$password=$rows["password"];
$user_id=$rows["id"];
$user_level=$rows["level"];
	
// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Add user information to the session (global session variables)		
$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["PASSWORD"] = $password;
$_SESSION["USERID"] = $user_id;
$_SESSION["LEVEL"] =$user_level;


echo "<h2>You are now logged in as ".$_SESSION["USER"]." with access level ".$_SESSION["LEVEL"]."</h2>";

    if($_SESSION["LEVEL"] == 0) // admin interface
    {
        ?>
        <?php
        if (!isset($_COOKIE[$_SESSION['USERID']])) {
            // cookie is not set, set cookie
            $cookie_name = $_SESSION['USERID'];
            $cookie_value = $_SESSION['USER'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        header("Location: admin-main.php");
        exit();
        ?>
        <?php
        
    }
    
    else if($_SESSION["LEVEL"] == 1) // manager interface
    {
        ?>
        <?php
        if (!isset($_COOKIE[$_SESSION['USERID']])) {
            // cookie is not set, set cookie
            $cookie_name = $_SESSION['USERID'];
            $cookie_value = $_SESSION['USER'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        header("Location: resident-main.php");
        exit();
        ?>
        <?php
    }



//if wrong username and password
} else {
	
$_SESSION["Login"] = "NO";
header("Location: index.php");
}

mysqli_close($conn);


?>

<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");

if(count($_GET)>0) {
    $userID=$_GET['userID'];

    require ("config.php"); 

    $sql = "SELECT * FROM user where userID='$userID' ";
    $result = mysqli_query($conn, $sql);
}
?>