<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
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

   session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require "include/functions.php";
	require "include/PHPMailer.php";
	require "include/Exception.php"; 
	require 'include/SMTP.php';

	include "config.php";

	$access = "Y";
    $status;
	$email;

	if(isset($_POST['email']) && (!empty($_POST['email']))){
		$email = $_POST['email'];
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		
		if($count !=1){
		
			$status = "Invalid user";
			$email = $_POST['email'];
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

			if(!$email)
			{
				$status = $status . "Invalid email address, please type a valid email address";
				$access = "N";
			} 
			else 
			{
				$sql = "SELECT * FROM user WHERE email='$email'";
				$result = mysqli_query($conn, $sql);  //execute sql statement
				$count = mysqli_num_rows($result);

				if ($count == 0) 
				{
					$statusMsg = $status . "Email is not registered";
					$access = "N";
				}
			}
		} 
		else 
		{
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
        }
	}

	if ($access == "Y") {
		$sql = "SELECT * FROM token WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			$sql = "DELETE FROM token WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
		}

		$expFormat = mktime(
			date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y")
		);
	
		$expDate = date("Y-m-d H:i:s", $expFormat);
		$token = mt_rand(100000, 999999);

		$sql = "INSERT INTO token (email, token, expDate) VALUES ('".$email."', '".$token."', '".$expDate."')";
		$result = mysqli_query($conn, $sql);

		$output='<p>Dear user,</p>';
		$output.='<p>Please enter the following code to reset your password.</p>';
		$output.='<p>------------------------------------------------------------------</p>';
		$output.='<h1>Your Code: '.$token.'</h1>';
		$output.='<p>------------------------------------------------------------------</p>';
		$output.='<p>The code will expire after 1 day for security purpose.</p>';
		$output.='<p>If you did not request this forgotten password email, no action 
		is needed, your password will not be reset. However, you may want to log into 
		your account and change your security password as someone may have guessed it.</p>';   	
		$output.='<p>Thanks</p>';
		$body = $output; 
		$subject = "Password Recovery - KTDI Team";

		$email_to = $email;
		// $fromserver = "noreply@yourwebsite.com"; 
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		$mail->Host = "smtp.gmail.com"; // Enter your host here
		$mail->SMTPAuth = true;
		$mail->Username = "techmaniacad@gmail.com"; // Enter your email here
		$mail->Password = "ewfyqeplrlpktsho"; //Enter your app password here
		$mail->Port = 587;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->IsHTML(true);
		$mail->setFrom("techmaniacad@gmail.com", "Tech Maniac");
		$mail->AddAddress($email_to);
		$mail->Subject = $subject;
		$mail->Body = $body;

		// $returnArray = array();
		
		if(!$mail->Send()) {
			$status = "Password Recovery Failed";
			$email = "";

			echo 'alert("' . $status . 'email: ' . $email. '")';
			// $returnArray[] = array(
			// 	"status" => $status,
			// 	"email" => $email
			// );
		} else {
			$status = "Password Recovery Email Has Been Sent, Please Check Your Email";
			echo 'alert("' . $status . 'email: ' . $email. '")';
			// $returnArray[] = array(
			// 	"status" => $status,
			// 	"email" => $email
			// );
		}
	}
	else {
		echo 'alert("' . $status . 'email: ' . $email. '")';
		// $returnArray[] = array(
		// 	"status" => $status,
		// 	"email" => ""
		// );
	}?>		

<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-md-center h-100">
			<div class="card-wrapper">
				<div class="brand" align=center>
					<img src="img/UTM-KTDI-LOGO.jpg" alt="logo" style="margin:80px auto 15px; padding:10px 100px">
				</div>
				<div class="card fat">
					<div class="card-body">
						<form method="post" action="reset.php?token=<?php echo $token .'&email='.$email.'&action=reset';?>" name="reset"><br/><br/>
							<table border="0" cellspacing="5" cellpadding="0" class="table">
								<tr colspan="2">
									<div class="form-group">
										<h3 class="card-title">Forgot Password</h3>
									</div>
								</tr>

								<tr>
									<div class="form-group">
										<td><strong>Email</strong></td>
										<td><input type="text" name="email" size="50" class="form-control" value="<?php echo $email;?>" disabled></td>
									</div>
								</tr>

								<tr>
									<div class="form-group">
										<td><label><strong>Enter Your Code Here:</strong></label></td>
										<td><input type="text" name="token" size="10" class="form-control" placeholder="6-digit code"/></td>
									</div>
								</tr>

								<tr>
									<div class="form-group m-0">
										<td></td>
										<td><input type="submit" class="form-control btn btn-primary btn-block" value="Reset Your Password"/></td>
									</div>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>
	