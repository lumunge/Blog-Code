<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: techlogin.php");
exit;
}

// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$phone = $service = $mpesa = $amount = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST['phone']) || empty($_POST['service']) || empty($_POST['mpesa']) || empty($_POST['amount'])){
$sweet = 'error';
echo $feedback = 'Please Fill in All Details For Approval.';
}

//Validate Customer username
if(empty(trim($_POST["phone"]))){
    $sweet = 'error';
    $feedback = 'Please provide customers username';
    }else{
    $phone = trim($_POST["phone"]);
    }

//Validate service code
if(empty(trim($_POST["service"]))){
$sweet = 'error';
$feedback = 'Please Choose The service Provided.';
}else{
$service = trim($_POST["service"]);
}

//Validate mpesa
if(empty(trim($_POST["mpesa"]))){
$sweet = 'error';
$feedback = 'Please enter the mpesa transaction code or amount Paid.';  
} else{
$mpesa = trim($_POST["mpesa"]);
}

// Validate amount
if(empty(trim($_POST["amount"]))){
$sweet = 'error';
$feedback = 'Please enter the amount charged.';
} else{
$amount = trim($_POST["amount"]);
}

// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO partialpayments (phone, service, mpesa, amount) VALUES (?, ?, ?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssss", $param_phone, $param_service, $param_mpesa, $param_amount);

// Set parameters
$param_phone = $phone;
$param_service = $service;
$param_mpesa = $mpesa;
$param_amount = $amount;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page
header("location: techDashBoard.php");
} else{
echo "Something went wrong. Please try again later.";
}
}

// Close statement
mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>|Technician Dashboard</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- sweet alert -->
<link rel="stylesheet" href="css/sweetalert.css" />
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Css -->
<link rel="stylesheet" href="css/tech.css" />
</head>
<body>
<main>
<section>
<header id="heady">
<nav class="navbar navbar-expand-md navbar-light bg-transparent mb-4">
<a id="logo" href="techDashBoard.php" class="navbar-brand"
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
<li class="nav-item active">
<a class="nav-link  active" href="techdashBoard.php">DashBoard</a>
</li>
<li class="nav-item">
<a class="nav-link " href="techEdit.php">Edit Account</a>
</li>
<li class="nav-item">
<a id="modalBtn" class="nav-link btny" href="#">Send Feedback</a>
</li>
<li class="nav-item">
<a class="nav-link" href="technicianinbox.php" class="">Inbox.</a>
</li>
</div>
<a href="customerlogout.php" class="btn btn-outline-danger ml-auto">Sign Out </a> 
</div>
</nav>
</header>
</section>


<section class="main-landing">
<h1 class="welcometext animated infinite pulse">Hi Technician, <b><?php echo htmlspecialchars($_SESSION["techusername"]); ?></b>. Welcome to mafundi dashboard.</h1>

<div class="landing-content">
<div class="booking-form">
<div class="card bg-transparent text-light mb-4 animated bounceInDown delay 3s">
<div class="card-body">
<h2 class="card-title">Job Approval Form.</h2>
<div class="card-text">
<p id="">Please fill in the form with valid credentials for the approval of a job well done. Thankyou for your coperation</p>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="form-group">
<label>Client's Mobile Number.</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="tel" class="form-control" placeholder="format(07........)[10 digits]" minlength="10"
maxlength="10" value="<?php echo $phone; ?>">
</div>

<div class="form-group">
<label>Service Provided</label>
<select class="form-control" name="service" id="service" placeholder="Service Provided..." value="<?php echo $service; ?>">
<option></option>
<option>DoorLock Breaking</option>
<option>Plumbing</option>
<option>Painting</option>
<option>Electrician</option>
<option>Inner Decorations</option>
<option>Water Heaters</option>
<option>Hanging Lines</option>
<option>Blocked Sinks</option>
<option>Blocked Toilets</option>
<option>Showers</option>
<option>Wood Works</option>
<option>Metal Works</option>
</select>
</div>

<div class="form-group">
<label>Mpesa Transaction Code</label>
<input type="text" name="mpesa" class="form-control" placeholder="Transaction Code..." value="<?php echo $mpesa; ?>">
</div>

<div class="form-group">
<label>Amount Paid/Sent</label>
<input type="text" name="amount" class="form-control" placeholder="Amount..." value="<?php echo $amount; ?>">
</div>      

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
<input type="reset" class="btn btn-default" value="Reset">
</div>
</form>
</div> 
</div> 
</div>
</div>
<div class="tasks">

<div class="feedback divy">
<div id="simplemodal" class = "modal" >
<div class="modal-content bg-dark">
<span class="closeBtn">&times;</span>

<form action="replymessagestech.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "techusername" class = "form-control" value="<?php echo htmlspecialchars($_SESSION["techusername"]); ?>" required>
<br>
<label for="">Comment</label>
<textarea name="message" cols="30" class = "form-control" placeholder="Your Thoughts." required></textarea>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Send Message">
<input type="reset" class="btn btn-outline-secondary ml-3" value="Reset">
</form>
</div>
</div>

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
<p id="btm">All Rights Reserved CopyRights  &copy; mafundiservices 2019</p>
</div>
</footer>
</section>
</main>
<!--Optional Javascript-->
<script src="js/index.js"></script>
<script src="js/jquery.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

