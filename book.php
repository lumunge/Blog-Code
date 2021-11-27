<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "admin");


// $sweet = "";
if($sweet == 'error'){
    echo "<script>swal('Error', '".$feedback."')</script>";
}elseif($sweet == 'success'){
    echo "<script>swal('Success', '".$feedback."')</script>";
}
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['service'])) {
    $service = $_POST['service'];
}
if (isset($_POST['location'])) {
    $location = $_POST['location'];
}
if (isset($_POST['house_name'])) {
    $house_name = $_POST['house_name'];
}
if (isset($_POST['house_number'])) {
    $house_number = $_POST['house_number'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if (isset($_POST['addDescription'])) {
    $addDescription = $_POST['addDescription'];
}
 
// Prepare an insert statement
$sql = "INSERT INTO bookings (username, service, location, house_name, house_number, email, phone, addDescription) VALUES (?,?,?,?,?,?,?,?)";
 


if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssssss", $username, $service, $location, $house_name, $house_number, $email, $phone, $addDescription);
    
    
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $sweet = 'success';
        $feedback = 'Your Booking Will Be Processed Shortly And You will Receive a Notification Status';
    } else{
        $sweet = 'error';
        $feedback = 'An Error Has Occurred Please Try Again Later.';
    }
} else{
    $sweet = 'error';
    $feedback = 'Error! Please Try again later.';
}

header('Location: customerDashBoard.php');


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["username"])){
        $sweet = 'error';
        $feedback = 'Please Enter The Username At The Top';
    } else{
        $name = ($_SESSION["username"]);
        if($username != $name){
            $sweet = 'error';
            $feedback = "Please enter the name at the top of the page, Thank  you.";
        }
    }
    
    // Validate email address
    if(empty($_POST["email"])){
        $sweet = 'error';
        $feedback = 'Please Enter Your Email Address.';
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $sweet = 'error';
            $feedback = 'Invalid Email Address, Try Again.';
        }
    }

    // Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    // Redirect to reports page
    header("location: customerDashBoard.php");
    } else{
    echo "Something went wrong. Please try again later.";
    }
}
// Close connection
mysqli_close($link);
?>


