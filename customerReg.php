<?php
// Include config file
require_once "dbconfig.php";
error_reporting(E_ERROR);

// Define variables and initialize with empty values
$username = $mpesa = $amount = $password = $confirm_password = $sweet = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['username']) || empty($_POST['mpesa']) || empty($_POST['amount']) || empty($_POST['password']) || empty($_POST['confirm_password'])){
        $sweet = 'error';
        $feedback = 'Please enter all registration details';
    }

// Validate username
if(empty(trim($_POST["username"]))){
    $sweet = 'error';
    $feedback = 'Enter a Username.';
} else{
// Prepare a select statement
$sql = "SELECT id FROM users WHERE username = ?";

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
    $feedback = 'This username is already taken try another';
} else{
$username = trim($_POST["username"]);
}
} else{
$feedback =  'Oops! Something went wrong. Please try again later 1.';
}
}

// Close statement
mysqli_stmt_close($stmt);
}

//Validate mpesa code
if(empty(trim($_POST["mpesa"]))){
    $sweet = 'error';
    $feedback = 'Please pay up a registration fee of 100 ksh and enter the transaction code to register with Mafundi Services';
    } elseif(strlen(trim($_POST["mpesa"])) < 10){
        $sweet = 'error';
        $feedback = 'Please Enter A Valid Mpesa transaction Code.';
    } else{
    $mpesa = trim($_POST["mpesa"]);
    }

    //Validate amount
    if(empty(trim($_POST["amount"]))){
        $sweet = 'error';
        $feedback = 'Please enter the amount sent.';  
        } elseif(trim($_POST["amount"]) != 100){
            $sweet = 'error';
            $feedback = 'We only accept 100 shillings, if you paid in excess go to your dash board and request for a refund';
        } else{
        $amount = trim($_POST["amount"]);
        }



// Validate password
if(empty(trim($_POST["password"]))){
    $sweet = 'error';
    $feedback = 'Please enter a valid password.';
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
if(empty($sweet) && ($password != $confirm_password)){
    $sweet = 'error';
    $feedback = 'Your Password did not match, please try again.';
}
}

// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO users (username, mpesa, amount, password) VALUES (?, ?, ?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_mpesa, $param_amount, $param_password);

// Set parameters
$param_username = $username;
$param_mpesa = $mpesa;
$param_amount = $amount;
$param_password = password_hash($password, PASSWORD_DEFAULT);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    $sweet = "success";
    $feedback =  "Your Request Will Be Processed Shortly, Please Wait A While And Try To Log In to your Account.";
} else{
    $sweet = 'error';
    $feedback =  "Something went wrong. Please try again later.2";
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
<title>Client Registration | Mafundi</title>
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
<link rel="stylesheet" href="css/custreg.css">

</head>
<body>
<main>
<?php
// $sweet = "";
if($sweet == 'error'){
    echo '<script>swal("Error", "'.$feedback.'", "error")</script>';
}elseif($sweet == 'success'){
    echo '<script>swal("Success", "'.$feedback.'", "success")</script>';
}
?>

    <a href="a.home.php"><img src="img/logo.png" alt=""></a>
    <div class="card bg-transparent text-light mb-4 animated bounceInDown delay 3s">
    <div class="card-body">
    <h2 class="card-title">Client Registration Form.</h2>
    <div class="card-text">
    <p id="">Please fill in your credentials to register with mafundi services.</p>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" placeholder="Username..." value="<?php echo $username; ?>">
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
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
</div>

<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password..." value="<?php echo $confirm_password; ?>">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
<input type="reset" class="btn btn-default" value="Reset">
</div>
<p id="">Already have an account? <a href="customerlogin.php">Login here</a>.</p>
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