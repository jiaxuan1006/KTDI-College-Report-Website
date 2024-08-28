<?php
session_start();

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

if ($_SESSION["LEVEL"] == 1) { 	//only user with access level 1 (resident) can view
?>
	<html>
	<head>
        <title>User Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

            body, html {
            height: 100%;
            line-height: 1.8;
            }

            /* Full height image header */
            .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-image: url("/w3images/mac.jpg");
            min-height: 100%;
            }

            .w3-bar .w3-button {
            padding: 16px;
            text-decoration: none;
            }
        </style>
    <head>
	<body>
        <!-- Navbar (sit on top) -->
        <div class="w3-top">
            <div class="w3-bar w3-white w3-card" id="myNavbar">
                <a href="resident-main.php" class="w3-bar-item"><img src='img/UTM-KTDI-LOGO.jpg' height=auto width=35px style="padding:3px 0px"/></a>
                <!-- Right-sided navbar links -->
                <div class="w3-right w3-hide-small">
                <a href="resident-main.php#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> ABOUT</a>
                <a href="resident-main.php#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a>
                <a href="resident-main.php#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> WORK</a>
                <a href="update_resident_profile_form.php?id=<?php echo "$_SESSION[USERID]"; ?>" class="w3-bar-item w3-button"><i class="fa fa-image"></i> PROFILE</a>
                <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i>LOG OUT</a>
                </div>
                <!-- Hide right-floated links on small screens and replace them with a menu icon -->

                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar on small screens when clicking the menu icon -->
        <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
            <a href="resident-main.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
            <a href="resident-main.php#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
            <a href="resident-main.php#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
            <a href="update_resident_profile_form.php?id=<?php echo "$_SESSION[USERID]"; ?>" onclick="w3_close()" class="w3-bar-item w3-button">PROFILE</a>
            <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGOUT</a>
        </nav>

	<div class="w3-container" style="padding:85px 50px">
	    <h1>Profile Information</h1>
    <hr><br/>

<?php
        $userID = $_GET['id'];
		 
        require ("config.php");
        
        // Retrieve data from database
        $sql="SELECT * FROM user WHERE id='$userID'"; 
        $result = mysqli_query($conn, $sql);
        $rows=mysqli_fetch_assoc($result);
?>

<form name="form" method="post" action="update_user_profile.php?id=<?php echo $userID;?>" 
    onsubmit="return(validate_profile());" enctype="multipart/form-data">
<table border="0" cellspacing="5" cellpadding="0" class="w3-table" style="width:fit-content;">
    <tr>
        <td>User ID</td>
        <td><input name="id" type="text" size="10" class="form-control" value="<?php echo $rows['id']; ?>" disabled></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" size="50" class="form-control" value="<?php echo $rows['name']; ?>"></td>
    </tr>
    <tr>
		<td>Gender</td>
		<td><input type="text" name="gender" size="10" class="form-control" value="<?php echo $rows['gender']; ?>"></td>
	</tr>
	<tr>
		<td>Contact</td>
		<td><input type="text" name="contact" size="15" class="form-control" value="<?php echo $rows['contact']; ?>"></td>
	</tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" size="50" class="form-control" value="<?php echo $rows['email']; ?>"></td>
    </tr>
	<tr>
		<td><button type="button" name="Back" class="w3-button w3-light-grey form-control" onclick="document.location='resident-main.php'">Back</td>
		<td><input type="submit" name="Save" value="Save" class="w3-button w3-light-grey form-control" style="width:fit-content; float:right;"></td>
	</tr>
</table>
</form>

<?php
    if(isset($_POST['btn'])){
        $name = $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];
        $folder = "images/" . $name;
        $dbh = new PDO("mysql:host=localhost; dbname=ktdi_db", "root", "");
        $db = mysqli_connect("localhost", "root", "", "ktdi_db");
        $data = file_get_contents($_FILES['file']['tmp_name']);
        
        $stmt = $dbh->prepare("INSERT INTO image VALUES('',?,?,?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$data);
        $stmt->bindParam(3,$userID);
        $stmt->execute();

        move_uploaded_file($tempname, $folder);
    }
            ?>
            <div class="w3-container" style="position:absolute; top:195px; right:125px;">
                <?php
                    $sql = "SELECT * FROM image WHERE userID = '$userID' ORDER BY id DESC LIMIT 1";
                    $result3 = mysqli_query($conn, $sql);
                    $rows2 = mysqli_fetch_assoc($result3);
                    if($rows2){
                    ?>
                        <div class="w3-container" align=center>
                            <img src="images/<?php echo $rows2['file_name']; ?>" width=280px height=auto />
                        
                    <?php
                    } else{
                        echo "<div class='w3-container' align=center>";
                        echo "<img src='images/user-icon.png' width=280px height=auto />";
                    }?>
                        </div>
                <div class="w3-container w3-padding-16" align=right>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="file" name="file" class="w3-button w3-hover-none"/>
                        <button type="submit" name="btn" class="w3-button w3-light-grey form-control" 
                                style="width:fit-content; float:right;">Upload</button>
                    </form> 
                </div>
            </div>
    </div>
<script src="validate.js"></script>
</body>
</html>

<?php
    mysqli_close($conn);
    
}else if ($_SESSION["LEVEL"] != 1) {
	
    echo "<p>Wrong User Level! You are not authorized to view this page</p>";
        
    echo "<p><a href='admin-main.php'>Go back to main page</a></p>";
    
    echo "<p><a href='logout.php'>LOGOUT</a></p>";
    }
?>