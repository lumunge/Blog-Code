<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.5">
<title>Mafundi Payments.</title>
<!-- Bootstrap Stylesheet -->
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

<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">
</head>
<body>

<?php

   if(isset($_SESSION['success']) && $_SESSION['success'] != '')
   {
     echo '<h2> '.$_SESSION['success'].' <h2>';
     unset($_SESSION['success']);
   }

   if(isset($_SESSION['status']) && $_SESSION['status'] != '')
   {
     echo '<h2 class = "bg-danger"> '.$_SESSION['status'].' <h2>';
     unset($_SESSION['status']);
   }
 
 ?>



<div class="container-fluid">
<div class="row">

<main role="main" class="col-lg-12">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Mafundi Services</h1>
<div class="btn-toolbar mb-2 mb-md-0">
<div class="btn-group mr-2">
<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
</div>
<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
<span data-feather="calendar"></span>
This week
</button>
</div>
</div>

<h2>Booking Records 2019.</h2>
<div class="table-responsive">
    <?php  

        $conn = mysqli_connect("localhost", "root", "", "admin");
        $query = "SELECT * FROM approvedpayments";
        $query_run = mysqli_query($conn, $query);
      ?>
<table class="table table-striped table-sm">
<thead>
<tr>
<th>User Id</th>
<th>Phone</th>
<th>Service</th>
<th>Date</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<?php
if(mysqli_num_rows($query_run) > 0)
{
while($row = mysqli_fetch_assoc($query_run))
{
?>

<tr>
    <td><?php echo $row['pend_id']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['service']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['amount']; ?></td>
</tr>

<?php
    }
}
else
{
    echo "No record was found";
}
?>
</tbody>
</table>
<?php

$sql = "SELECT SUM(amount) AS value_sum FROM approvedpayments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p style='font-size: 2rem;color:green;'>Total Earnings are Ksh: <b>" . $row["value_sum"] . "<b>";
    }
} else {
    echo "0 results";
}
?>
</div>

</div>
</div>

<section class="regfee">
<h2>Registration Fees.</h2>
<div class="table-responsive">
    <?php  

        $conn = mysqli_connect("localhost", "root", "", "admin");
        $query = "SELECT * FROM accounts";
        $query_run = mysqli_query($conn, $query);
      ?>
<table class="table table-striped table-sm">
<thead>
<tr>
<th>Username</th>
<th>Mpesa Code</th>
<th>Amount</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
if(mysqli_num_rows($query_run) > 0)
{
while($row = mysqli_fetch_assoc($query_run))
{
?>

<tr>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['mpesa']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['date']; ?></td>
</tr>

<?php
    }
}
else
{
    echo "No record was found";
}
?>
</tbody>
</table>
<?php

$sql = "SELECT SUM(amount) AS sumValue FROM accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p style='font-size: 2rem;color:green;'>Total Registration Fees are Ksh: <b>" . $row["sumValue"] . "<b>";
    }
} else {
    echo "0 results";
}
?>
</div>

</div>
</div>
</section>


</main>

<!--Optional Javascript-->
<script src="js/index.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
