<?php
session_start();
require('config.php');

?>
	<html>
	<head>
		<title>KTDI login</title>
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
		<!-- <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a> -->
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
	</head>
	<body>
	<section class="h-200">
		<div class="container h-200">
			<div class="row justify-content-md-center h-200">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/UTM-KTDI-LOGO.jpg" alt="logo" style="margin:80px auto 15px; padding:10px 100px"/>
					</div>
					<div class="card fat">
						<div class="card-body">
						
							<h3 class="card-title">Login</h3>
							<form method="POST" class="needs-validation" action="check-login.php">
								<div class="form-group">
									<label for="username"><strong>Username</strong></label>
									<input id="fname" type="fname" class="form-control" name="fname" placeholder="Enter username" required >
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										Username is invalid or not exist
									</div>
								</div>

								<div class="form-group">
									<label for="password"><strong>Password</strong></label>
									<input id="password" type="password" class="form-control" name="fpwd" placeholder="Enter password" required data-eye>
									<a href="forgot.php" class="float-right">Forgot Password?</a>
									<div class="valid-feedback">Valid.</div>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
								
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="sign-up.php">Create One</a>
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
	

 