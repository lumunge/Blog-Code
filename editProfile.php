<?php
session_start();
error_reporting(E_ERROR);
include('dbconfig.php');


if (empty($_SESSION['id'])){
header('location:customerlogin.php');
}


if(isset($_POST['buttonUpdate'])){
if(empty($_POST['username'])){
$sweet = 'error';
$feedback = 'Provide a username';
}else{
$username = $_POST['username'];

if(empty($_POST['password'])){
$sweet = 'error';
$feedback = 'Provide a valid password';
}elseif(strlen(trim($_POST["password"])) < 6){
$sweet = 'error';
$feedback = 'Must have six characters';
}else{
$password = $_POST['password'];

if(empty($_POST['cpassword'])){
$sweet = 'error';
$feedback = 'PLease confirm your password';
}else{
$cpassword = $_POST['cpassword'];

if(empty($sweet) && ($password != $cpassword)){
$sweet = 'Your passwords do not match';
}else{
$update = "UPDATE `users` SET `username` = '$username', `password`='$password' WHERE `id` = '".$_SESSION['id']."'";

if(mysqli_prepare($conn, $update)){
    // Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

//set parameters
$sweet = 'success';
$feedback = 'Your Profile was updates successfully';
header('Location:customerDashBoard.php');
}else{
$sweet = 'success';
$feedback = 'Failed to update your profile';
}
}
}
}
}
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Proflie | Customer</title>
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/sweetalert.css" type="text/css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>


<!-- ERROR MESSEGES USING PHP AND SWEET ALERTS -->
<?php
if ($sweet=='error'){
echo"<script>
swal('Error','".$feedback."')
</script>";
}elseif($sweet=='success'){
echo"<script>
swal('Success','".$feedback."')
</script>";
}
?>



<div class="container">
<div class="jumbotron">
<div class="row"  >
<div class="col-lg-4 col-md-4">
<a href="customerDashBoard.php" class="btn btn-primary btn-sm">Back to profile</a>
</div>

<div class="col-md-2 col-lg-2 col-sm-12">

<?php
$select="SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$record=mysqli_query($conn,$select);
$row=mysqli_fetch_array($record);
?>

<form method="POST" autocomplete="off">
<label >Username</label>
<input type="text" name="username" class="form-control" value="<?php echo $row['username']  ?>">
</div> 
<div class="col-md-2 col-lg-2 col-sm-12"  style="background-color: aliceblue">
<label>Password</label>
<input type="password" name="password"  class="form-control"value="<?php echo $row['password'] ?>">
</div> 	
</div> 
<div class="row" >
<div class="col-lg-4 col-md-4">

</div>
<div  class="col-md-3 col-lg-4 col-sm-12">
<label> Confirm Password</label>
<input type="password" name="cpassword" class="form-control" value="<?php echo $row['cpassword'] ?>">

<input type="submit" name="buttonUpdate" value="Update Account" class="form-control btn-info">
<br/>
</form>

</div>

</div>
</div>

</div>
</div>




</body>
</html>