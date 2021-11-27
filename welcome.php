<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: customerlogin.php");
exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hello, world!</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css">
<!--Css-->
<link rel="stylesheet" href="css/book.css ">
</head>
<body>
<main>
<header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
<a href="a.home.php"><img class = "logo-img" src="img/logo.png" alt="" ALIGN=CENTER></a><button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
<div class="navbar-nav">
<a href="#" class="nav-item nav-link active">Home</a>
<a href="#" class="nav-item nav-link">Contacts</a>
<a href="#" class="nav-item nav-link">FAQS&FeedBack</a>
<a href="#" class="nav-item nav-link">Help</a>
</div>
<a href="customerlogout.php" class="btn btn-outline-danger ml-auto">Sign Out </a> 
<a href="reset-password.php" class="btn btn-outline-warning ml-3">Reset Password</a>
</div>
</nav>
</header>

<section id="bookingform">
<div class="container">
<div class="page-header">
<h1 class="welcometext animated infinite pulse">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Mafundi Services.</h1>
</div>
<div id="formation" class="card bg-transparent">
<div class="card-body">
<h2 class="card-title animated rubberBand ">Book A Fundi Here !</h2>
<?php
$nameErr = $emailErr = "";
$name = $email = "";
?>
<form name="bookform" action = "book.php" method = "POST">
<div class="form-group">
<span class="form-label">Username</span>
<input class="form-control" type="text" name ="username" placeholder="username..." value="<?php echo $name; ?>">
<span class="error"><?php echo $nameErr; ?></span>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<span class="form-label">Location</span>
<select class="form-control"  name = "location" required>
<option value="" selected hidden>Your Location</option>
<option>Mathare</option>
<option>Runogone</option>
<option>PoshMart</option>
<option>Makutano</option>
<option>Meru Town</option>
<option>Mejjas</option>
<option>Tuliza Fm</option>
</select>
<span class="select-arrow"></span>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<span class="form-label">House Name</span>
<select class="form-control" name = "house_name" required>
<option value="" selected hidden>House Name</option>
<option>HillTop</option>
<option>Orange House</option>
<option>Yellow House</option>
<option>Joshua's Place</option>
<option>Glass House</option>
<option>Scholars</option>
<option>4J House</option>
</select>
<span class="select-arrow"></span>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<span class="form-label">House Number</span>
<input type = "number" min = "1" max = "20" name = "house_number" class="form-control" placeholder = "House No." required>
<option value="" selected hidden>House Number</option>
<span class="select-arrow"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<span class="form-label">Email</span>
<input class="form-control" type="email" name = "email" placeholder="Enter your Email">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Contact No.</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="text" class="form-control" placeholder="format(07........)[10 digits]" minlength="10"
maxlength="10" required>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<span class="form-label">Day of Request</span>
<input class="form-control" type="date" name = "date" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<span class="form-label">Time Of Request</span>
<input class="form-control" type="time" name = "time" required>
</div>
</div>
</div>
<div class="form-group">
<span class="form-label">Additional House Description</span>
<textarea class="form-control" type="text" name = "addDescription" placeholder="House description..."></textarea>
</div>
<div class="form-btn">
<button type="submit" class="btn btn-outline-success">Book Now!</button>
<button type="reset" class="btn btn-outline-secondary ml-3">Reset</button>
</div>
</form>
</div>
</div>
</div>
</section>


<!-- FOOTER SECTION -->
<section id="futa" class="mt-4">
<footer>
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-3">
<div class="card bg-transparent mt-3">
<h4 class="card-title">Contact Us</h4>
<strong>Website: </strong><p>www.mafundiservices.com</p>
<strong>Email: </strong><p>mafundiservices@gmail.com</p>
<strong>Social Media: </strong><p>@mafundiservices</p>
<strong>Phone: +(254) 74542-458788</strong>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="card bg-transparent mt-3">
<h4 class="card-title">Useful Links</h4>
<ul id="useful" class="list-group">
<li class="list-group-item bg-transparent"><a href="a.home.html">Home</a></li>
<li class="list-group-item bg-transparent"><a href="aboutus">about us</a></li>
<li class="list-group-item bg-transparent"><a href="contactus">contact us</a></li>
<li class="list-group-item bg-transparent"><a href="contactus">help</a></li>
</ul>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="card bg-transparent mt-3">
<h4 class="card-title">Social Media Links</h4>
<div class="card-text">
<a href="#" class="youtube">
<i class="fab fa-youtube fa-3x m-2"></i
></a>
<a href="#" class="twitter"
><i class="fab fa-twitter fa-3x m-2"></i
></a>
<a href="#" class="facebook"
><i class="fab fa-facebook-square fa-3x m-2"></i
></a>
<a href="#" class="google-plus"
><i class="fab fa-google-plus-g fa-3x m-2"></i
></a>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="card bg-transparent mt-3">
<h4 class="card-title">Subscribe to our NewsLetter Here</h4>
<p class="">You can leave us with your email address below inorder to receive our latest updates on new trends and prices of certain equipment, this will also guarantee a certain discount in the future services from mafundi services,We appericiate your membership</p>	

<form action="maillist.php" method="POST">
<input type="email" name="email" class="form-control" placeholder="Email Address...">
<br>
<button type="button" class="btn btn-outline-secondary mt-2">Subscribe</button>
</form>
</div>
</div>
</div>
<p class="btm">All Rights Reserved CopyRights  &copy; mafundiservices 2019</p>
</div>
</footer>
</section>


<!--Optional Javascript-->
<script src="js/book.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</main>
</body>
</html>