<?php
   session_start();
   require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register Page</title>
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
</head>

<body class="sign-up-page">
	<section>
		<div class="container">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/UTM-KTDI-LOGO.jpg" alt="logo" style="margin:80px auto 15px; padding:10px 100px">
					</div>
					<div class="card fat">
						<div class="card-body">
							<?php
          if (isset($_SESSION['fail_message']) )
          {
            ?>
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['fail_message'];?>
          </div>
        <?php
            unset($_SESSION['fail_message']);
          }
        ?>

     <?php
          if (isset($_SESSION['success_message']) )
          {
            ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success_message'];?>
          </div>
          <?php
            unset($_SESSION['success_message']);
          }
    ?>
							<h3 class="card-title">Sign Up</h3>
							<form method="POST" class="needs-validation" novalidate="" action="registerprocess.php">
								<div class="form-group">
									<label for="username"><strong>Username</strong></label>
									<input id="name" type="text" class="form-control" name="username" required autofocus placeholder="Enter your username">
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										What's your username?
									</div>
								</div>

								<div class="form-group">
									<label for="name"><strong>Name</strong></label>
									<input id="name" type="text" class="form-control" name="fname" required autofocus placeholder="Enter your full name">
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="matric-no"><strong>Matric Number</strong></label>
									<input id="id" type="text" class="form-control" name="id" required autofocus placeholder="Enter your Matric Number">
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										Matric Number invalid
									</div>
								</div>

								<div class="form-group">
									<label for="email"><strong>E-Mail Address</strong></label>
									<input id="email" type="email" class="form-control" name="femail" placeholder="Enter E-Mail" required>
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password"><strong>Password</strong></label>
									<input id="password" type="password" class="form-control" name="fpwd" placeholder="Enter strong password" required data-eye>
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="term.php">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script>
	// Disable form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Get the forms we want to add validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>