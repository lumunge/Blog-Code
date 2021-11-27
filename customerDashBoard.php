<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: customerlogin.php");
    exit;
}

require_once "dbconfig.php";


// Define variables and initialize with empty values
$username = $service = $location = $house_name = $house_number = $email = $phone = $addDescription = $sweet = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['service']) || empty($_POST['location']) || empty($_POST['house_name']) || empty($_POST['house_number']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['addDescription'])) {
        $sweet = 'error';
        $feedback = 'Please enter all registration details';
    }

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }

    // Validate Service.
    if (empty($_POST["service"])) {
        $sweet = 'error';
        $feedback = 'Please Pick A Service';
    } else {
        $service = $_POST["service"];
    }

    // Validate Location.
    if (empty($_POST["location"])) {
        $sweet = 'error';
        $feedback = 'Please Enter A Location';
    } else {
        $location = $_POST["location"];
    }

    // Validate House Name.
    if (empty($_POST["house_name"])) {
        $sweet = 'error';
        $feedback = 'Please Enter The Name Of Your House';
    } else {
        $house_name = $_POST["house_name"];
    }

    // Validate House Number.
    if (empty($_POST["house_number"])) {
        $sweet = 'error';
        $feedback = 'Please Your House Number(Between 1 - 30).';
    } else {
        $house_number = $_POST["house_number"];
    }

    // Validate email address
    if (empty($_POST["email"])) {
        $sweet = 'error';
        $feedback = 'Please Enter Your Email Address.';
    } elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['email'])) {
        $sweet = 'error';
        $feedback = 'Enter A valid Email address.';
    } else {
        $email = $_POST["email"];
    }

    // Validate Phone
    if (empty($_POST["phone"])) {
        $sweet = 'error';
        $feedback = 'Please Enter Your Phone NUmber For Contacting Purposes.';
    } else {
        $phone = $_POST["phone"];
    }

    // Validate PhonDescription.
    if (empty($_POST["addDescription"])) {
        $sweet = 'error';
        $feedback = 'Please A Description Of The House. (Eg, Name, Location, LandLord, Color etc...)';
    } else {
        $addDescription = $_POST["addDescription"];
    }


    if (empty($sweet)) {

// Prepare an insert statement
        $sql = "INSERT INTO bookings (username, service, location, house_name, house_number, email, phone, addDescription) VALUES (?,?,?,?,?,?,?,?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $username, $service, $location, $house_name, $house_number, $email, $phone, $addDescription);

            //Set Parameters.
            $param_username = $username;
            $param_service = $service;
            $param_location = $location;
            $param_house_name = $house_name;
            $param_house_number = $house_number;
            $param_email = $email;
            $param_phone = $phone;
            $param_addDescription = $addDescription;



            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $sweet = 'success';
                $feedback = 'Your Booking Will Be Processed Shortly And You will Receive a Notification Status on your phone.';
            } else {
                $sweet = 'error';
                $feedback = 'An Error Has Occurred Please Try Again Later.';
            }
        } else {
            $sweet = 'error';
            $feedback = 'Error! Please Try again later.';
        }
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
<title>|Customer DashBoard|</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Css -->
<link rel="stylesheet" href="css/cust.css" />
<link rel="stylesheet" href="css/book.css">
<!-- <link rel="stylesheet" href="css/custdash.css"> -->
</head>
<body>
<main>

<?php
// $sweet = "";
if ($sweet == 'error') {
    echo "<script> swal('Error', '".$feedback."') </script>";
} elseif ($sweet == 'success') {
    echo "<script> swal('Success', '".$feedback."') </script>";
}
?>

<section>
<header id="heady">
<nav class="navbar navbar-expand-md navbar-light bg-transparent mb-4">
<a id="logo" href="customerDashBoard.php" class="navbar-brand"
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
<a class="nav-link " id="hmu" href="bookingHistory.php">Booking History</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="pendingpayments.php">Payments</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="customerEdit.php">Edit Profile</a>
</li>
<li class="nav-item">
<a class="nav-link " id="modalBtn" class="btny">Send Feedback</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="messages.php" class="">Messages.</a>
</li>
</div>
<a href="customerlogout.php" class="btn btn-outline-danger ml-auto">Sign Out </a> 
</div>
</nav>
</header>
</section>

<!-- <div class="wan">
<img src="img/plumbing4.jpeg" alt="">
</div> -->

<!-- <div class="tuu">
<img src="img/plumbing6.jpg" alt="">
</div>
<div class="tree">
<img src="img/plumbing9.jpeg" alt="">
</div> -->


<section class="main-landing">
<h1 class="welcometext animated infinite pulse">Hi Client, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Mafundi Services.</h1>
<div class="landing-content">


<div class="booking-form">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<h4 class="ttle">Please Enter Your Details To Book A Technician Or Fundi.</h4>
<div class="form-group">
<span class="form-label">Username</span>
<input class="form-control" type="text" name ="username" placeholder="username..." value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">

</div>
<div class="form-group">
<span class="form-label">Service Needed</span>
<select class="form-control"  name = "service">
<option value="<?php echo $service; ?>" selected hidden>Service</option>
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
<span class="select-arrow"></span>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<span class="form-label">Location</span>
<select class="form-control" name = "location" value="<?php echo $location; ?>">
<option selected hidden>Your Location</option>
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
<select class="form-control" name = "house_name" value="<?php echo $house_name; ?>" >
<option selected hidden>House Name</option>
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
<input type = "number" min = "1" max = "20" name = "house_number" class="form-control" placeholder = "House No." value="<?php echo $house_number; ?>" >
<option selected hidden>House Number</option>
<span class="select-arrow"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<span class="form-label">Email</span>
<input class="form-control" type="email" name = "email" value="<?php echo $email; ?>" placeholder="Enter your Email">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="form-label">Contact No.</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="tel" class="form-control" placeholder="format(07........)[10 digits]" minlength="10"
maxlength="10" value="<?php echo $phone; ?>">
</div>
</div>
</div>
<div class="form-group">
<span class="form-label">Additional House Description</span>
<textarea class="form-control" type="text" value="<?php echo $addDescription; ?>" name = "addDescription" placeholder="House description..."></textarea>
</div>
<div class="form-btn">
<button type="submit" class="btn btn-book">Book Now!</button>
<button type="reset" class="btn btn-reset ml-3"  >Reset</button>
</div>
</form>
</div>

<div class="feedback divy">
<div id="simplemodal" class = "modal" >
<div class="modal-content bg-dark">
<span class="closeBtn">&times;</span>

<form id="contactForm" action="replymessagescust.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "username" class = "form-control" placeholder="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
<br>
<label for="">Message</label>
<textarea name="message" cols="30" class = "form-control" placeholder="Your Message Here..."></textarea>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Send Message.">
<input type="reset" class="btn btn-outline-secondary ml-3" value="Reset">
</form>
</div>
</div>




<div id="simplemodal2" class = "modal" >
<div class="modalcontent bg-dark">
<span class="closeButton">&times;</span>

<form id="refundForm" action="refunds.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "username" class = "form-control" placeholder="username">
<br>
<label for="">Mobile</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="text" class="form-control" placeholder="format(07........)[10 digits]" minlength="10"
maxlength="10">
<br>
<label for="">Email Address</label>
<input type="email" name = "email" class = "form-control" placeholder="email Address">
<br>
<label for="">Your Claim</label>
<select class="form-control"  name = "claim">
<option value="<?php echo $claim; ?>" selected hidden>Claim</option>
<option>Overcharged</option>
<option>Poor Service Quality.</option>
</select>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Requets Refund.">
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
<p class="btm">All Rights Reserved CopyRights  &copy; mafundiservices 2019</p>
</div>
</footer>
</section>
</main>
<!--Optional Javascript-->
<script src="js/index.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

