<?php
session_start();
error_reporting(E_ERROR);

require 'dbconfig.php';

if (empty($_SESSION['techusername'])){
header('location: techlogin.php');
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
<link rel="stylesheet" href="css/messages.css" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Inbox</title>
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
<a class="nav-link  active" id="hmu" href="techDashBoard.php">DashBoard</a>
</li>
<li class="nav-item">
<a class="nav-link " id="hmu" href="techEdit.php" class="">Edit Profile.</a>
</li>
</div>
<a href="customerlogout.php" class="btn bttn btn-outline-danger ml-auto">Sign Out </a> 
</div>
</nav>
</header>
<h1 class="title"><i class="fa fa-inbox"></i> Inbox.</h1>
</section>

<section id="gaid">

<div class="container">
<hr/>

<div class="table-responsive">
<?php
$conn = mysqli_connect("localhost", "root", "", "admin");

$query ="SELECT * FROM admintechnicianmessages AS a INNER JOIN techaccounts AS t ON a.technician = t.techusername WHERE a.technician='".$_SESSION['techusername']."' ORDER BY a.msg_id DESC ";
$query_run = mysqli_query($conn, $query);
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Message Id</th>
<th> Sender </th>
<th>Reply</th>
<th>Date Replied.</th>
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
<td><?php echo $row['msg_id']; ?></td>
<td><?php echo 'Admin' ?></td>
<td><?php echo $row['message']; ?></td>
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
</div>




<div id="simplemodal" class = "modal" >
<div class="modal-content bg-dark">
<span class="closeBtn">&times;</span>

<form id="contactForm" action="replymessagescust.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "username" class = "form-control" placeholder="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
<br>
<label for="">Message</label>
<textarea name="message" cols="30" class = "form-control" placeholder="Your Message Here..."></textarea>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Send Message.">
<input type="reset" class="btn btn-outline-secondary ml-3" value="Reset">
</form>
</div>
</div>

</div>
</section>
</main>

<script src="js/messages.js"></script>
<script src="js/jquery.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
