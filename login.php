<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Administrator Login Page |</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css">
<!-- Css -->
<link rel="stylesheet" href="css/customerlogin.css">
</head>
<body>
<main>

<?php
session_start();
include('header.php'); 

$sweet = "";

// $sweet = "";
if($sweet == 'error'){
    echo "<script>swal('Error', '".$feedback."')</script>";
}elseif($sweet == 'success'){
    echo "<script>swal('Success', '".$feedback."')</script>";
}
?>

<a href="a.home.php"><img src="img/logo.png" alt=""></a>
<div class="card bg-transparent text-light mb-4 animated bounceInDown delay 3s">
<div class="card-body">
<h2 class="card-title text-warning">Login Form</h2>
<div class="card-text">
<p>Please fill in your credentials to login.</p>


<?php
if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
echo '<h2 class = "bg-danger text-white"> ' .$_SESSION['status'].' </h2>';
unset($_SESSION['status']);
}
?>
</div>


<form class = "user" action = "code.php" method = "POST">
<label for="">Email Address</label>
<div class="form-group">
<input type="email" name = "emaill" class="form-control form-control-user" placeholder="Enter Email Address...">
</div>

<label for="">Password</label>
<div class="form-group">
<input type="password" name  = "passwordd" class="form-control form-control-user" placeholder="Password">
</div>

<div class="form-group">
<div class="custom-control custom-checkbox small">
<input type="checkbox" class="custom-control-input" id="customCheck">
<label class="custom-control-label" for="customCheck">Remember Me</label>
</div>
</div>
<button type = "submit" name = "login_btn" class = "btn btn-primary btn-user btn-block">Log In</button>
<hr>
</form>

<hr>
<div class="text-center">
<a class="small" href="forgot-password.html">Forgot Password?</a>
</div>
</div>
</div>
</div>
</div>

</div>
<p class="futa">All Rights Reserved &copy; CopyRights mafundiservices 2019</p>
</div>

</div>

</div>


<?php
include('scripts.php'); 
?>








<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</main>
</body>
</html>










