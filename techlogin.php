<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
header("location: techDashBoard.php");
exit;
}

// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$techusername = $password = $sweet = "";
$techusername_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
if(empty(trim($_POST["techusername"]))){
    $sweet = 'error';
    $feedback = 'Please enter your Username';
} else{
$techusername = trim($_POST["techusername"]);
}

// Check if password is empty
if(empty(trim($_POST["password"]))){
    $sweet = 'error';
    $feedback = 'Please enter your Password';
} else{
$password = trim($_POST["password"]);
}

// Validate credentials
if(empty($username_err) && empty($password_err)){
// Prepare a select statement
$sql = "SELECT id, techusername, password FROM techaccounts WHERE techusername = ?";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_techusername);

// Set parameters
$param_techusername = $techusername;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Store result
mysqli_stmt_store_result($stmt);

// Check if username exists, if yes then verify password
if(mysqli_stmt_num_rows($stmt) == 1){                    
// Bind result variables
mysqli_stmt_bind_result($stmt, $id, $techusername, $hashed_password);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
// Password is correct, so start a new session
session_start();

// Store data in session variables
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $id;
$_SESSION["techusername"] = $techusername;                            

// Redirect user to welcome page
header("location: techDashBoard.php");
} else{
// Display an error message if password is not valid
$sweet = 'error';
$feedback = 'The password you entered was not valid.';
}
}
} else{
// Display an error message if username doesn't exist
$sweet = 'error';
$feedback = 'Please waitfor approval from the administrator.';
}
} else{
echo "Oops! Something went wrong. Please try again later.";
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
<meta charset="UTF-8">
<title>Technician Login Page |</title>
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
if($sweet == 'error'){
    echo "<script>swal('Error', '".$feedback."')</script>";
}elseif($sweet == 'success'){
    echo "<script>swal('Success', '".$feedback."')</script>";
}
?>

<a href="a.home.php"><img src="img/logo.png" alt=""></a>
<div class="card bg-transparent text-light mb-4 animated bounceInDown delay 3s">
<div class="card-body">
<h2 class="card-title text-warning">Technician Login Form</h2>
<div class="card-text">
<p>Please fill in your credentials to login.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group">
<label>Username</label>
<input type="text" name="techusername" class="form-control" value="<?php echo $techusername; ?>">
</div>    
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Login">
</div>
<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
</form>
</div>    
</main>  

<!--Optional Javascript-->
<script src="js/jquery.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>