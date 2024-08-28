<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
		filter: saturate(125%);
		background-position: center;
		background-size: cover;
		background-image: url("img/UTM-KTDI.jpg");
		min-height: 100%;
		}

		.w3-bar .w3-button{
		padding: 16px;
        text-decoration: none;
		}
	</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php#home" class="w3-bar-item"><img src='img/UTM-KTDI-LOGO.jpg' height=auto width=35px style="padding:3px 0px"/></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="index.php#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> ABOUT</a>
      <!-- <a href="index.php#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a> -->
      <a href="index.php#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> WORK</a>
      <a href="sign-up.php" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> SIGN UP</a>
      <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-lock"></i> LOGIN</a>
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
  <a href="index.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <!-- <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a> -->
  <a href="index.php#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="sign-up.php" onclick="w3_close()" class="w3-bar-item w3-button">SIGN UP</a>
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGIN</a>
</nav>


<?php

    include ('config.php');

    if (isset($_GET["token"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
        $token = $_GET["token"];
        $email = $_GET["email"];
        $currDate = date("Y-m-d H:i:s");
        $sql = mysqli_query($conn, "SELECT * FROM token WHERE token = '$token' AND email = '$email'");
        $row = mysqli_num_rows($sql);
        $error = "";

        if ($row == "")
        {
            $error .= 'The token is invalid. <a href="forgot-password.php">Click here</a> to reset your token.';
        }
        else
        {
            $row = mysqli_fetch_assoc($sql);
            $expDate = $row['expDate'];
            if ($expDate >= $currDate)
            {?>
            

            <section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-md-center h-100">
			<div class="card-wrapper">
				<div class="brand" align=center>
					<img src="img/UTM-KTDI-LOGO.jpg" alt="logo" style="margin:80px auto 15px; padding:10px 100px">
				</div>
				<div class="card fat">
					<div class="card-body">
                        <form method="post" action="" name="update">
                            <div class="form-group">
                                <h3 class="card-title">Reset Password</h3>
                            </div>

                            <div class="form-group m-0">
                                <input type="hidden" name="action" class="form-control" value="update" />
                            </div>
                            
                            <div class="form-group">
                                <label><strong>Enter New Password:</strong></label>
                                <input type="password" name="password1" class="form-control" id="password1" maxlength="15" required />
                            </div>

                            <div class="form-group">
                                <label><strong>Re-Enter New Password:</strong></label>
                                <input type="password" name="password2" class="form-control" id="password2" maxlength="15" required/>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="email" class="form-control" value="<?php echo $email;?>"/>
                            </div>

                            <div class="form-group m-0">
                                <input type="submit" class="form-control btn btn-primary btn-block" value="Reset Password" />
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>



    
    <?php
    }
            else{
                $error .= 'Token expired. You are trying to use the expired token which 
                is valid only for 1 day.<a href="forgot-password.php">Click here</a> to reset your token.<br /><br />';
            }
        }
        if($error!=""){
            echo "<script>alert('".$error."');</script>";
        }			
    } // isset email key validate end


    if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
        $error="";
        $password1 = mysqli_real_escape_string($conn,$_POST["password1"]);
        $password2 = mysqli_real_escape_string($conn,$_POST["password2"]);
        $email = $_POST["email"];
        $currDate = date("Y-m-d H:i:s");
        if ($password1 != $password2)
        {
            $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
        }
        if($error != "")
        {
            echo "<script>alert('".$error."');</script>";
        }
        else
        {
            mysqli_query($conn, "UPDATE user SET password ='$password1' WHERE email ='$email'");
            mysqli_query($conn,"DELETE FROM token WHERE email ='$email'");
            
            echo '<script>alert("Congratulations! Your password has been updated successfully. Directing you to the login page...");';
            echo "document.location.href='login.php';</script>";
        }		
    }
?>