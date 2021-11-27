<?php
session_start();
error_reporting(E_ERROR);

require 'dbconfig.php';

if (empty($_SESSION['username'])){
header('location:customerlogin.php');

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Booking History</title>


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
<link rel="stylesheet" href="css/history.css"/>

</head>

<body>
<div class="overlay">
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
<a class="nav-link " id="hmu" href="pendingpayments.php">Payments</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="customerEdit.php">Edit Profile</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="messages.php" class="">Messages.</a>
</li>
</div>
<a href="customerlogout.php" class="btn btn-outline-danger ml-auto">Sign Out </a> 
</div>
</nav>
</header>
</section>
<section id="gaid">
<div class="container">

<div id="printableArea" class="">
<h2 style="text-align: center"><em><img id="label" src="img/logo.png" alt="" ALIGN="CENTER"
/> Booking History</em></h2>
<hr/>

<?php
require_once "dbconfig.php";

$cart="SELECT * FROM bookings AS u INNER JOIN accounts AS n ON u.username=n.username WHERE u.username='".$_SESSION['username']."' ORDER BY u.username DESC ";


$query=mysqli_query($conn,$cart);
?>

<table class="table table-bordered" id="mytable">
<thead>
<tr>
<th>Id</th>
<th>UserName</th>
<th>Service Ordered</th>
<th>Location</th>
<th>House Name</th>
<th>Email Address</th>
<th>Phone Number</th>
<th>Date</th>
<th>Action</th>


<?php
if(mysqli_num_rows($query) > 0)
{
while ($row = mysqli_fetch_assoc($query)){
    ?>
<tr>
<td> <?php echo $row['book_id'] ?> </td>
<td> <?php echo $row['username'] ?> </td>
<td> <?php echo $row['service'] ?> </td>
<td> <?php echo $row['location'] ?> </td>
<td> <?php echo $row['house_name'] ?> </td>
<td> <?php echo $row['email'] ?> </td>
<td> <?php echo $row['phone'] ?> </td>
<td> <?php echo $row['bookdate'] ?> </td>
<td><a href="details.php?id = <?php echo $row['book_id'];?> "> More...</a></td>
</tr>
<?php
}}else{
    echo "No record was found";
}
?>
</tbody>
</table>
</div>
</div>
</section>

<div class="divu">
<a href="#"><h4><span class="printer" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</h4></span></a>
</div>
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