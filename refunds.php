<?php
// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$username = $phone = $email = $claim = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['username']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['claim'])){
        $sweet = 'error';
        $feedback = 'Please enter all details.';
    }

// Validate username
if(empty(trim($_POST["username"]))){
    $sweet = 'error';
    $feedback = 'Enter Your Username.';
} else{
// Prepare a select statement
$sql = "SELECT id FROM refunds WHERE username = ?";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_username);

// Set parameters
$param_username = trim($_POST["username"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
    $sweet = 'error';
    $feedback = 'This username is already taken.';
} else{
$username = trim($_POST["username"]);
}
} else{
$feedback =  'Oops! Something went wrong. Please try again later.';
}
}

// Close statement
mysqli_stmt_close($stmt);
}

//Validate mpesa code
if(empty(trim($_POST["phone"]))){
    $sweet = 'error';
    $feedback = 'Enter The phone numberr used for the transaction. ';
    } else{
    $phone = trim($_POST["phone"]);
    }

    //Validate amount
    if(empty(trim($_POST["email"]))){
        $sweet = 'error';
        $feedback = 'Please enter your email address.';  
        }  else{
        $email = trim($_POST["email"]);
        }



// Validate claim
if(empty(trim($_POST["claim"]))){
    $sweet = 'error';
    $feedback = 'Please pick your claim.';
} else{
$claim = trim($_POST["claim"]);
}


// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO refunds (username, phone, email, claim) VALUES (?, ?, ?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_phone, $param_email, $param_claim);

// Set parameters
$param_username = $username;
$param_phone = $phone;
$param_email = $email;
$param_claim = $claim;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page
header("location: customerlogin.php");
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

