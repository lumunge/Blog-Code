<?php
session_start();
error_reporting(E_ERROR);

require 'dbconfig.php';
include 'functions2.php';

if (empty($_SESSION['username'])){
header('location:customerlogin.php');

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
<link rel="stylesheet" href="css/pendingpayments.css" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Pending Payments for Approval.</title>
</head>
<body>
<main>

<section class="mainbody">
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
<a class="nav-link " id="hmu" href="customerEdit.php">Edit Profile</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="messages.php" class="">Messages.</a>
</li>
</div>
<a href="customerlogout.php" class="btn bttn btn-outline-danger ml-auto">Sign Out </a> 
</div>
</nav>
</header>
<h1 class="title">Pending Approval Requests.</h1>
</section>

<section id="jumbo" class="jumbotron text-center">
<div class="container">
<h3 class="text-warning" style="text-decoration: underline;">Please Customer Take part in approving your payments to Mafundi Sacco to ensure we serve you better</h3>

<?php

$query="SELECT * FROM bookings AS b INNER JOIN partialpayments AS p ON b.phone=p.phone WHERE b.username='".$_SESSION['username']."' ORDER BY p.phone DESC ";



// $query = "SELECT * FROM `partialpayments`;";

if(count(fetchAll($query)) > 0){
foreach(fetchAll($query) as $row){  
?>
<p class="lead text-light"><?php echo 'Hello, I am a technician with Mafundi Service, Hope Your Would not Mind To Approve The payment.'; ?></p>
<h1 class="jumbotron-heading text-success"><?php echo $row['service']; ?></h1>
<h3 class="jumbotron-heading text-success">Ksh <?php echo $row['amount']; ?></h3>
<small> <?php echo $row['date']; ?></small>
<br><br>
<a href="acceptpayments.php?id=<?php echo $row['id'];?>" class="btn pay btn-success my-2">Approve Payment</a>
<a href="rejectpayments.php?id=<?php echo $row['id'];?>" class="btn pay btn-danger my-2">Reject Payment</a>
<br>


<?php 
}
}else{
echo 'No pending requests';
}
?>

</div>
</section>

<div id="printableArea" class="col-lg-12 col-md-12">
<h4 style="text-align: center; text-decoration: underline;"><img src="img/logo.png" alt="" ALIGN="CENTER"
/>My Payments.</h4>
<hr/>


<?php
require_once "dbconfig.php";

$cart="SELECT * FROM approvedpayments AS a INNER JOIN bookings AS b ON a.service=b.service WHERE b.username='".$_SESSION['username']."' ORDER BY a.phone DESC ";

$query=mysqli_query($conn,$cart);
?>

<table class="table table-bordered" id="mytable2">
    <thead>
        <tr>
<th>Id</th>
<th>Phone Number</th>
<th>Service Ordered</th>
<th>Mpesa Code</th>
<th>Amount</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>


</tbody>
<?php
if(mysqli_num_rows($query) > 0)
{
while ($row = mysqli_fetch_assoc($query)){
?>
<tr>
<td><?php echo $row['pend_id']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td> <?php echo $row['service']; ?></td>
<td> <?php echo $row['mpesa']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['date']; ?></td>
<td>
<a href="individualPayment.php" class="text-light lead"> More... </a>
</td>
</tr>
<?php
}}else{
    echo "No record was found";
}
?>
</tbody>
</table>
</div>
<div style="text-align: right; padding-top: 10px;">
<a href="#"><h4><span class="printer" style="color: #fff;" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print Report.</h4></span></a>
</div>
</main>
<!-- PRINTING SCRIPT -->
<script>

function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;

var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
}

</script>
<!-- END OF PRINTING SCRIPT -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>