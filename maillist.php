<?php
// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$emailaddress = "";
$emailaddress_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

//Validate email address
if(empty(trim($_POST["emailaddress"]))){
    $emailaddress_err = "Please enter an email address.";     
    } elseif(strlen(trim($_POST["emailaddress"])) < 6){
    $emailaddress_err = "Incorrect email format. ";
    } else{
    $emailaddress = trim($_POST["emailaddress"]);
    }

// Check input errors before inserting in database
if(empty($emailaddress_err)){
// Prepare an insert statement
$sql = "INSERT INTO emaillist (emailaddress) VALUES (?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_emailaddress);

// Set parameters
$param_emailaddress = $emailaddress;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page
header("Location: a.home.php");
} else{
echo "Something went wrong. Please try again later.";
}
}
}

// Close connection
mysqli_close($conn);
}
?>
