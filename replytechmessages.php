<?php
// Initialize the session
session_start();

// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$admin = $technician = $message = $sweet = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['admin']) || empty($_POST['technician']) || empty($_POST['message'])){
        $sweet = 'error';
        $feedback = 'Please fill in all details.';
    }

    if (isset($_POST['admin'])) {
      $admin = $_POST['admin'];
    }
    if (isset($_POST['technician'])) {
      $technician = $_POST['technician'];
    }
    if (isset($_POST['message'])) {
      $message = $_POST['message'];
    }


// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO admintechnicianmessages (admin, technician, message) VALUES (?, ?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sss", $param_admin, $param_technician, $param_message);

// Set parameters
$param_admin = $admin;
$param_technician = $technician;
$param_message = $message;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page
header("location: inbox.php");
} else{
echo "Something went wrong. Please try again later.";
}
// Close statement
mysqli_stmt_close($stmt);
}
}

// Close connection
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Client Rrply Form</title>
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

<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group">
<label>Email Address.</label>
<input type="text" name="admin" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
</div>

<div class="form-group">
<label>Techician Name</label>
<input type="text" name="technician" class="form-control" placeholder="Technician's Name....">
</div>

<div class="form-group">
<label>Your Message</label>
<textarea name="message" id="" class="form-control" cols="30" rows="10" value="<?php echo $message; ?>"></textarea>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
<input type="reset" class="btn btn-default" value="Reset">
</div>
<p id="">Back to Inbox <a href="inbox.php">Login here</a>.</p>
</form>
</div> 
<p class="futa">All Rights Reserved Copyrights &copy; mafundiservices 2019.</p>
</div> 
</div>
</div>
</main>  


<!--Optional Javascript-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>