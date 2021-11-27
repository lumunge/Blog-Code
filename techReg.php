<?php
// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$techusername = $phone = $email = $location = $profession = $password = $confirm_password = $addDescription = $sweet = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validate username
if(empty(trim($_POST["techusername"]))){
$sweet = 'error';
$feedback = 'Please enter a Username.';
} else{
// Prepare a select statement
$sql = "SELECT id FROM techaccounts WHERE techusername = ?";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_techusername);

// Set parameters
$param_techusername = trim($_POST["techusername"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
$sweet = 'error';
$feedback = 'This username is already taken try another';
} else{
$techusername = trim($_POST["techusername"]);
}
} else{
$sweet = 'error';
$feedback = 'Oops! Something went wrong. Please try again later.';
}
}

// Close statement
mysqli_stmt_close($stmt);
}


//Validate Phone
if(empty(trim($_POST['phone']))){
$sweet = 'error';
$feedback = 'Enter Your Contact Number';
}else{
$phone = trim($_POST['phone']);
}

//Validate Email
if(empty(trim($_POST['email']))){
$sweet = 'error';
$feedback = 'Enter Your Email Address';
}elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['email'])){
    $sweet = 'error';
$feedback = 'Enter A valid Email address.';
}else{
$email = trim($_POST['email']);
}


//Validate Location
if(empty(trim($_POST['location']))){
$sweet = 'error';
$feedback = 'Please enter Your Location.';
}else{
$location = trim($_POST['location']);
}

//Validate Profession
if(empty(trim($_POST['profession']))){
$sweet = 'error';
$feedback = 'Please Select A Profession/Expertise.';
}else{
$profession = trim($_POST['profession']);
}

// Validate password
if(empty(trim($_POST["password"]))){
$password_err = "Please enter a password.";     
} elseif(strlen(trim($_POST["password"])) < 6){
$sweet = 'error';
$feedback = 'Password must have atleast 6 characters.';    
} else{
$password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
$sweet = 'error';
$feedback = 'Please confirm your password.';  
} else{
$confirm_password = trim($_POST["confirm_password"]);
if(empty($password_err) && ($password != $confirm_password)){
$sweet = 'error';
$feedback = 'Password did not match.';  
}
}

// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO technician (techusername, phone, email, location, profession, password, addDescription) VALUES (?,?,?,?,?,?,?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sssssss", $param_techusername, $param_phone, $param_email, $param_location, $param_profession, $param_password, $param_addDescription);

// Set parameters
$param_techusername = $techusername;
$param_phone = $phone;
$param_email = $email;
$param_location = $location;
$param_profession = $profession;
$param_password = password_hash($password, PASSWORD_DEFAULT);
$param_addDescription = $addDescription;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    $sweet = 'success';
    $feedback = 'Your Acount Was Created Successfully, Please wait for approval from the administrator.';
} else{
    $sweet = 'error';
    $feedback = 'Something went wrong, try again later.';
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
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>| Technician Registration Form</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css">
<!--Font awesome-->
<link rel="stylesheet" href="css/all.min.css">
<!--Css-->
<link rel="stylesheet" href="css/techreg.css">
</head>
<body>
<main>
<?php
// $sweet = "";
if($sweet == 'error'){
echo "<script>swal('Error', '".$feedback."')</script>";
}elseif($sweet == 'success'){
echo "<script>swal('Success', '".$feedback."')</script>";
}
?>
<a href="a.home.php"><img src="img/logo.png" alt=""></a>

<div class="container">
<div class="card bg-transparent text-light mb-4 animated bounceInDown delay 3s">
<div class="card-body">
<h3 id="texty" class="card-title">Register as a Fundi Here!</h3>
<div class="card-text">
<hr>
<div class="row">
<div class="col-md-6 col-lg-6">
<form action="techReg.php" method="POST">
<div class="form-group">
<label for="">Full Names</label>
<input id="name" name="techusername" type="text" class="form-control" placeholder="Name" value="<?php echo $techusername; ?>">
</div>

<div class="form-group">
<label for="">Contact No.</label>
<input id="contact"
oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
name="phone" type="text" class="form-control" placeholder="Phone, fromat(07 **** ****) *10 digits*" minlength="10"
maxlength="10" value="<?php echo $phone; ?>">
</div>

<div class="form-group">
<label for="">Email</label>
<input id="email" name="email" type="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
</div>

</div>

<div class="col-md-6 col-lg-6">
<div class="form-group">
<label for="">Location</label>
<select class="form-control" name="location" id="location" placeholder="Your Location..." value="<?php echo $location; ?>">
<option></option>
<option>Mathare</option>
<option>Runogone</option>
<option>Mejjas</option>
<option>Mathare</option>
<option>JoyLand</option>
<option>Makutano</option>
<option>Meru Town</option>
</select>
</div>

<div class="form-group">
<label for="">Profession</label>
<select class="form-control" name="profession" id="profession" placeholder="Your Profession..." value="<?php echo $profession; ?>">
<option></option>
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
</div>
</div>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Password">
</div>

<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password...">
</div>

<div class="row">
<div class="form-group">
<label for="">Add Description</label>
<textarea name="addDescription" id="addDescription" class="form-control" cols="300" rows="3"
placeholder="Tell something about yourself..." value="<?php echo $addDescription; ?>" ></textarea>
</div>


<input id="register" name="register" type="submit" class="btn btn-outline-primary mr-2" value="Register">
<input type="reset" class="btn btn-outline-secondary ml-2" value="Reset" >
</form>
</div>
</div>
<p class="futa">All Rights Reserved Copyrights &copy; mafundiservices 2019.</p>
</div>
</div>
</div>
</body>
</html>