<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>|Mafundi Home|</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- mis slider -->
<link rel="stylesheet" href="css/mislider.css">
<link rel="stylesheet" href="css/mislider-custom.css">
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Owl carousel -->
<link rel="stylesheet" href="css/owl.carousel.css">
<!-- Css -->
<link rel="stylesheet" href="css/fundi.css" />
</head>
<body>
<main>
<header id="heady">
<nav class="navbar navbar-expand-md navbar-light bg-transparent mb-4">
<a id="logo" href="a.home.php" class="navbar-brand"
><img src="img/logo.png" alt="" ALIGN="CENTER"
/></a>
<button
type="button"
class="navbar-toggler"
data-toggle="collapse"
data-target="#navbarCollapse"
>
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
<div class="navbar-nav">
<li class="nav-item">
<a id="link" class="nav-link  active" href="a.home.php"
>Home</a
>
</li>
<li class="nav-item">
<a id="link" class="nav-link " href="about.php">About Us</a>
</li>
<li class="nav-item">
<a id="link" class="nav-link " href="faqs.php">FAQS & Feedback</a>
</li>
<li class="nav-item">
<a id="link" class="nav-link " href="help.php">Help</a>
</li>
</div>
<div id="sinlog">
<button class="btts">Sign Up</button>
<div class="dropcontent">
<a class="mini" href="customerReg.php">Client/Customer</a>
<a class="mini" href="techReg.php">Technician/Fundi</a>
</div>
</div>
<div id="sinlog">
<button class="btts">Log In</button>
<div class="dropcontent">
<a class="mini" href="customerlogin.php">Client/Customer</a>
<a class="mini" href="techlogin.php">Technician</a>
<a class="mini" href="login.php">Administrator</a>
</div>
</div>
</div>
</nav>
</header>

<!-- main landing -->
<div class="overlay"></div>
<section id="landing">
<div class="wrapper">
<div class="landing-image">
<img src="img/toolz3.jpeg" alt="" />
</div>

<div class="landing-text">
<h1>Mafundi Services</h1>
<h4>Household Services at your Convenience</h4>
</div>

<button class="button animated infinite pulse slow"><a href="customerReg.php" style="text-decoration:none;">
BOOK A SERVICE<i class="fas fa-arrow-right fa-1x"></i></a>
</button>
</div>
<br />
<br />
<div class="mainfas">
<a href="#aboutus"><i id="fassy" class="fas fa-angle-down fa-3x"></i></a>
</div>
</section>
<br><br>

<section class="search-section">

<div class="fundi">
<h1>Are you a Fundi or a Technician?</h1>
<div class="card bg-transparent p-4">
<p>Sign Up here with Mafundi Services to keep yourself open for available jobs. We require professionals with a wide experience in the area of expertise make sure you give us a brief description of yourself</p>

<a id="techie" href="techReg.php" class="btn">Sign Up Here</a>
</div>
</div>

<div class="card mr-4 searchy">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
<h6 class="searchtxt animated bounceInUp delay 2s">Search for a profession here!</h6><br>
<select class="form-control" name="profession" id="profession" style="text-align:center;">
<option value="none">Select Profession</option>
<option>DoorLock Breaking</option>
<option>Plumber</option>
<option>Mobile Repairer</option>
<option>Painting</option>
<option>Electrician</option>
<option>Inner Decorations</option>
<option>Water Heater</option>
<option>Hanging Lines</option>
<option>Blocked Sinks</option>
<option>Blocked Toilets</option>
<option>Showers</option>
<option>Wood Works</option>
<option>Metal Works</option>
</select>
<button id="search" class="btn btn-outline-success m-4 animated infinite pulse delay 3s" name="search"><b>Search</b></button>
</form>


<?php
$conn = mysqli_connect("localhost", "root", "", "admin");

if(isset($_POST['search']))
{
$profession = $_POST['profession'];

$sql = "SELECT * FROM technician WHERE profession = '$profession'";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
{
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
<div class = "table-responsive">
<table id="providers" class="table">
<thead>
<tr>
<th>Name</th>
<th>Location</th>
<th>Profession</th>
<th>Action</th>
</tr>
<tr>
<td><?php echo $row['techusername'];?></td>
<td><?php echo $row['location'];?></td>
<td><?php echo $row['profession'];?></td>
<td><button class="btn btn-outline-warning"><a href="customerReg.php" style="text-decoration: none;">Book Now</a></button></td>
</tr>
</thead>
</table>
</div>
</form>

<?php
}
}
?>
</div>
</section>


<section id="aboutus">
<h1 class="topic">Our Core Values</h1>
<div class="wrapper2">

<div class="core1">
<div class="card cardyb">
<div class="front">
<h2 class="card-title"><i class="fas fa-cogs fa-2x"></i> Diligence</h2>
</div>
<div class="back">
<div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad laborum possimus maxime delectus at. Fugit obcaecati vel vitae illum totam expedita voluptates, dolor repudiandae perferendis, nulla debitis sequi sapiente quo.</div>
</div>
</div>
</div>

<div class="core2">
<div class="card cardyb">
    <div class="front">
<h2 class="card-title"><i class="fas fa-clock fa-2x"></i> Convenience</h2>
</div>
<div class="back">
<div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad laborum possimus maxime delectus at. Fugit obcaecati vel vitae illum totam expedita voluptates, dolor repudiandae perferendis, nulla debitis sequi sapiente quo.</div>
</div>
</div>
</div>

<div class="core3">
<div class="card cardyb">
    <div class="front">
<h2 class="card-title"><i class="fab fa-envira fa-2x"></i>Eco-Friendliness</h2>
</div>
<div class="back">
<div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad laborum possimus maxime delectus at. Fugit obcaecati vel vitae illum totam expedita voluptates, dolor repudiandae perferendis, nulla debitis sequi sapiente quo.</div>
</div>
</div>
</div>

<div class="core4">
<div class="card cardyb">
<div class="front">
<h2 class="card-title"><i class="fas fa-certificate fa-2x"></i> Standardized</h2>
</div>
<div class="back">
<div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad laborum possimus maxime delectus at. Fugit obcaecati vel vitae illum totam expedita voluptates, dolor repudiandae perferendis, nulla debitis sequi sapiente quo.</div>
</div>
</div>
</div>
</div>
</section>

<section class="patners">
<h1 class="topic">Our Patners</h1>
<div class="patner-carousel owl-carousel">

<div class="pat">
<img src="img/patner1.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner4.png" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner5.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner6.png" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner7.jpg" alt=" " class="" />
</div>


<div class="pat">
<img src="img/patner9.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner9.png" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner10.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner11.png" alt=" " class="" />
</div>
<div class="pat">
<img src="img/patner13.png" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner14.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner19.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner20.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner21.jpg" alt=" " class="" />
</div>

<div class="pat">
<img src="img/patner22.jpg" alt=" " class="" />
</div>

</div>
</section>
<!-- footer -->
<a href="#landing"><i id="top" class="fas fa-chevron-up fa-3x"></i></a>
<footer class="section-footer">
<div class="container">
<div>
<h2>Our Social Media Links.</h2>
<a href="http://twitter.com"><i class="fab fa-twitter fa-2x"></i></a>
<a href="http://youtube.com"><i class="fab fa-youtube fa-2x"></i></a>
<a href="http://facebook.com"><i class="fab fa-facebook fa-2x"></i></a>
<br>
<button id="modalBtn" class="btn">Feedback Here</button>

<div id="simplemodal" class = "modal" >
<div class="modal-content bg-dark">
<span class="closeBtn">&times;</span>

<form id="contactForm" action="contact.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "username" class = "form-control" placeholder="username" required>
<br>
<label for="">Mobile</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="text" class="form-control" placeholder="format(07........)[10 digits]" minlength="10"
maxlength="10" required>
<br>
<label for="">Email Address</label>
<input type="email" name = "email" class = "form-control" placeholder="email Address" required>
<br>
<label for="">Comment</label>
<textarea name="comment" cols="30" class = "form-control" placeholder="Your Thoughts." required></textarea>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Send Message">
<input type="reset" class="btn btn-outline-secondary ml-3" value="Reset">
</form>
</div>
</div>




</div>

<div>
<h3>Mafundi Links</h3>
<ul>
<li><a href="#">Our Services</a></li>
<li><a href="#">About Us</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms Of Service</a></li>
</ul>
</div>
<div>
<h3>Blog Posts</h3>
<ul>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
<li><a href="#">Lorem, ipsum dolor.</a> </li>
</ul>
</div>
<div>
<h3>Subscribe</h3>
<p>Your are welcomed to subscribe to our monthy newsletter.</p>
<form action="maillist.php" name="email-form" method="POST">
<div class="email-form">
<span class="form-control-wrap">
<input type="email" name="emailaddress" id="email" size="40" class="form-control" placeholder="Email...">
<button id="maillist" type="submit" class="form-control submit">
<a href=""><i class="fas fa-chevron-right"></i></a>
</button>
</span>
</div>
</form>
<br>
</div>
</div>
</footer>
</section>
</main>

<script src="js/index.js"></script>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script>
$('.owl-carousel').owlCarousel({
loop: true,
margin: 10,
nav: true,
items: 15,
autoplay: true,
autoplayTimeout: 2000,
responsive: {
0 : {
items: 1
},
480 : {
items: 2
},
768 : {
items: 3
},
992 : {
items: 4
}
} 
});
</script>

<!-- SMMOOTH SCROLLING -->
<script>
$(document).ready(function(){
// Add smooth scrolling to all links
$("a").on('click', function(event) {

// Make sure this.hash has a value before overriding default behavior
if (this.hash !== "") {
// Prevent default anchor click behavior
event.preventDefault();

// Store hash
var hash = this.hash;

// Using jQuery's animate() method to add smooth page scroll
// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
$('html, body').animate({
scrollTop: $(hash).offset().top
}, 1000, function(){

// Add hash (#) to URL when done scrolling (default click behavior)
window.location.hash = hash;
});
} // End if
});
});
</script>
</body>
</html>
