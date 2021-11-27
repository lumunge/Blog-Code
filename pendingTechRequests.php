
<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Css -->
<link rel="stylesheet" href="css/.css" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Pending Technichian Requests</title>
</head>
<body>

<section>
<a href="a.home.php"><img src="img/logo.png" alt=""></a>
<div class="tech" style="text-align: right; padding: 1rem;">
<a href="pendingRequests.php" class="btn btn-outline-secondary">Customer Requests.</a>
</div>

</section>



<section class="jumbotron text-center">
<div class="container">

<?php
$query = "SELECT * FROM `technician`;";
if(count(fetchAll($query)) > 0){
foreach(fetchAll($query) as $row){  
?>

<h1 class="jumbotron-heading"><?php echo $row['techusername']; ?></h1>
<p class="lead text-muted"><?php echo 'Hello, Im interested in creating an account  as a <b><u><i> TECHNICIAN </i></u></b>with Mafundi Services'; ?></p>
<a href="approveTechRequests.php?id=<?php echo $row['id'];?>" class="btn btn-primary my-2">Accept Request</a>
<a href="rejectTechRequests.php?id=<?php echo $row['id'];?>" class="btn btn-secondary my-2">Decline Request</a>
<br>
<small> <?php echo $row['date']; ?></small>

<?php 
}
}else{
echo 'No pending requests';
}
?>



<?php


?>

</div>
</section>


<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>