<!--
***************************************************************
* Course        : SECV3104 Application Development
* Semester      : Semester 1, 2022/2023
* Section       : 02
* Project       : KTDI College Report Website
* Lecturer      : Dr Rahib
* Group         : Tech Maniac
* Group Members : Lee Qing Ren A20EC0065
*                 Ang Wan Xin  A20EC0015
*                 Tan Jia Xuan A20EC0154
*                 Low Jia Ying A20EC0070
***************************************************************
-->
<?php
session_start();

include "config.php";

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page
 

?>

<!DOCTYPE html>
<html>
<head>
<title>KTDI College Report Website</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
}


</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="admin-main.php" class="w3-bar-item"><img src='img/UTM-KTDI-LOGO.jpg' height=auto width=35px style="padding:3px 0px"/></a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
        <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> ABOUT</a>
        <!-- <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a> -->
        <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> WORK</a>
        <a href="update_admin_profile_form.php?id=<?php echo "$_SESSION[USERID]"; ?>" class="w3-bar-item w3-button"><i class="fa fa-image"></i> PROFILE</a>
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
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
    <!-- <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a> -->
    <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
    <a href="update_user_profile_form.php?id=<?php echo "$_SESSION[USERID]"; ?>" onclick="w3_close()" class="w3-bar-item w3-button">PROFILE</a>
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGOUT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container" id="home">
  <div class="w3-display-left w3-text-white w3-card-4" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Welcome to UTM KTDI College</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">Welcome to UTM KTDI College</span><br>
    <span class="w3-large">We ensure your comfort</span><br/>
    <span class="w3-large">while staying in the campus!</span>
    <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top">Learn more</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COLLEGE</h3>
  <p class="w3-center w3-large">Key features of our college</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-clock-o w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
      <p>We are responsive and eager to answer any inquiries. If there are problems or facilities needed to be fixed
		, we will take action immediately.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Caring</p>
      <p>Our fellows are friendly and willing to help. No need to worry about living helplessly, we will always 
		be there to provide helps.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-star-o w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Quality</p>
      <p>Our facilities are well-prepared for you to provide a comfortable surroundings for living. We aim to make you 
		to feel at ease as much as possible.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Maintenance</p>
      <p>The maintenace of our college is carried out regularly to maintain the facilities and the cleanliness. In addition,
		we welcome the reports from our residents so that we could take actions as soon as possible. </p>
    </div>
  </div>
</div>

<!-- Work Section -->
<div class="w3-container" style="padding:128px 16px" id="work">
  <h3 class="w3-center">OUR WORK</h3>
  <p class="w3-center w3-large">What we've done for people</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <img src="img/receptionist.webp" style="width:100%; height:215px;" onclick="onClick(this)" class="w3-hover-opacity" alt="Reception">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/maintenance.jpeg" style="width:100%; height:215px;" onclick="onClick(this)" class="w3-hover-opacity" alt="Maintenance">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/help-support.jpg" style="width:100%; height:215px;" onclick="onClick(this)" class="w3-hover-opacity" alt="Help Support">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/planning.jpg" style="width:100%; height:215px;" onclick="onClick(this)" class="w3-hover-opacity" alt="Planning and Discussion">
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<div class="w3-container w3-light-grey" style="padding:128px 16px" id="login">
	<!-- Image of location/map -->
    <img src="img/UTM.jpg" class="w3-image" style="width:100%;margin-top:48px">
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>