


    <?php
    //YA USERNAME COPY
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: customerlogin.php");
    exit;
    }

    // Include config file
    require_once "dbconfig.php";

    // Define variables and initialize with empty values
    $new_username = $new_password = $confirm_password = "";
    $new_username_err = $new_password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Validate new username
    if(empty(trim($_POST["new_username"]))){
    $new_username_err = "Please enter your new username.";     
    }  else{
    $new_username = trim($_POST["new_username"]);
    }

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
    $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
    $new_password_err = "Password must have atleast 6 characters.";
    } else{
    $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm the password.";
    } else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($new_password_err) && ($new_password != $confirm_password)){
    $confirm_password_err = "Password did not match.";
    }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
    // Prepare an update statement
    $sql = "UPDATE accounts SET username = ?, password = ? WHERE id = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_id);

    // Set parameters
    $param_username = $new_username;
    $param_password = password_hash($new_password, PASSWORD_DEFAULT);
    $param_id = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
    // Password updated successfully. Destroy the session, and redirect to login page
    session_destroy();
    header("location: customerlogin.php");
    exit();
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
    <link rel="stylesheet" href="css/customerEdit.css" />
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Your Profile.</title>
    </head>
    <body>
    <main>

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
    <li class="nav-item active">
    <a class="nav-link  active" id="hmu" href="customerDashBoard.php">DashBoard</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " id="hmu" href="bookingHistory.php">Booking History</a>
    </li>
    <li class="nav-item">
        
    <a class="nav-link " id="hmu" href="pendingPayments.php"><i class="fas fa-pencil fa-2x"></i>Payments</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " id="hmu" href="messages.php" class="">Inbox.</a>
    </li>
    </div>
    <a href="customerlogout.php" class="btn bttn btn-outline-danger ml-auto">Sign Out </a> 
    </div>
    </nav>
    </header>
    <h1 class="title">Edit Your Profile?</h1>
    </section>


    <div class="wrapper">
    <p>Please fill out this form to edit your details.</p>
    <form id="mation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
    <div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
    <label>New Username</label>
    <input type="text" name="new_username" class="form-control" value="<?php echo $new_username; ?>">
    <span class="help-block"><?php echo $new_username_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
    <label>New Password</label>
    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
    <span class="help-block"><?php echo $new_password_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control">
    <span class="help-block"><?php echo $confirm_password_err; ?></span>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-success" value="Update">
    <a class="btn btn-secondary" href="customerDashBoard.php">Cancel</a>
    </div>
    </form>
    </div>
    </div>
    <p id="right">All Rights Reserved &copy; Mafundi Services 2019.</p>
    </main>  
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>