<?php
if( $_SESSION['usertype'] = "admin")
{
    session_start();
}else{
    header("location: login.php");
}

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<a href="earnings.php" class="inline-block btn btn-success shadow-sm"><i
class="fab fa-money text-light"></i> Mafundi Earnings.</a>
<a href="adminSearch.php" class="inline-block btn btn-success shadow-sm"> Mafundi Search. <i
class="fa fa-search text-light"></i></a>
</div>

<!-- Total Administrators. -->
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="font-weight-bold text-primary text-uppercase mb-1">Registered Administartors</div>
<div class="h5 mb-0 font-weight-bold text-gray-800">

<?php
require 'dbconfig.php';
$query = "SELECT id FROM register ORDER BY id";
$query_run = mysqli_query($conn, $query);

$row = mysqli_num_rows($query_run);
//DISPLAYS TOTAL NO. OR ROWS IN THE DATABASE.
echo '<p style = "font-size: 2rem; color: green;">' .$row.'</p>';

?>
</div>
</div>
<div class="col-auto">
<i class="fas fa-user-secret fa-2x text-gray-300"></i>
</div>
</div>
<a href="register.php" class="btn btn-outline-primary">View Administrators</a>
</div>
</div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-success shadow h-100 py-2">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="font-weight-bold text-success text-uppercase mb-1">Registered Users.</div>
<div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
require 'dbconfig.php';
$query = "SELECT id FROM accounts ORDER BY id";
$query_run = mysqli_query($conn, $query);

$row = mysqli_num_rows($query_run);
//DISPLAYS TOTAL NO. OR ROWS IN THE DATABASE.
echo '<p style = "font-size: 2rem; color: green;">' .$row.'</p>';

?>
</div>
</div>
<div class="col-auto">
<i class="fas fa-users fa-2x text-gray-300"></i>
</div>
</div>
<a href="users.php" class="btn btn-outline-success">View Users</a>
</div>
</div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-info shadow h-100 py-2">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="font-weight-bold text-info text-uppercase mb-1">
Bookings.</div>
<div class="row no-gutters align-items-center">
<div class="col-auto">
<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
<?php
require 'dbconfig.php';
$query = "SELECT book_id FROM bookings ORDER BY book_id";
$query_run = mysqli_query($conn, $query);

$row = mysqli_num_rows($query_run);
//DISPLAYS TOTAL NO. OR ROWS IN THE DATABASE.
echo '<p style = "font-size: 2rem; color: green; text-align:right;">' .$row.'</p>';

?>
</div>
</div>
<div class="col">
</div>
</div>
</div>
<div class="col-auto">
<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
</div>
</div>
<a href="orders.php" class="btn btn-outline-info">View Bookings</a>
</div>
</div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
<div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
require 'dbconfig.php';
$query = "SELECT id FROM users ORDER BY id";
$query_run = mysqli_query($conn, $query);

$row = mysqli_num_rows($query_run);
//DISPLAYS TOTAL NO. OR ROWS IN THE DATABASE.
echo '<p style = "font-size: 2rem; color: green;">' .$row.'</p>';

?>
</div>

</div>
<div class="col-auto">
<i class="fas fa-comments fa-2x text-gray-300"></i>
</div>
</div>
<a href="pendingRequests.php" class="btn btn-outline-warning ">View Requests</a>
</div>
</div>
</div>
</div>

<!-- Content Row -->








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>