<?php
session_start();
error_reporting(E_ERROR);
include('dbconfig.php');

if (empty($_SESSION['username'])){
	header('location:a.home.php');
	
	
}
if (isset($_POST['printBtn'])){
	$_SESSION['printID']=$_POST['printID'];
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title> Print reciept</title>
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
	<div class="row">
		
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
		<div class="col-lg-4 col-md-4">
			
			<a href="rent_payment_history.php" class="btn btn-primary btn-sm">Back </a>
		</div>
		<div class="col-lg-5 col-md-5">
			<h3 style="text-align: center"><em>Print reciept</em></h3>
			<hr/>
			<a href="#"><h4><span class="" onclick="printDiv('printableArea')" style="color: blue">Print</h4></span></a>
			
			  <script>
		function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
		</script> 
                      <!---END Print script==========================-->
                      
                      
                      <!-----PRint Area========---->
					 <div id="printableArea">	
			<table class="table table-bordered" id="mytable">
				<th colspan="2" style="text-align: center" >Mafundi Services Booking History</th>
				<?php
				
                $cart="SELECT name
                FROM bookings
                LEFT JOIN users
                ON bookings.name=users.name;".$_SESSION['printID']."'   ";
                
				$query=mysqli_query($conn,$cart);
				$rowC=mysqli_fetch_array($query);
					echo '
				<tr><td><b>Payment No </b></td><td>'.$rowC['id'].'</td></tr>
				<tr><td><b>Payment Date </b></td>	<td>'.$rowC['timestamp'].'</td></tr>
				<tr><td><b>Location </b></td>	<td>'.$rowC['location'].'</td></tr>
				<tr><td><b>Amount </b></td><td>'.$rowC['amount'].'</td></tr>
				<tr><td><b>Mpesa Code </b></td>	<td>'.$rowC['mpesa'].'</td></tr>
				<tr><td><b>Balance </b></td>	<td>'.$rowC['balance'].'</td></tr>
			<tr><td><b>Status </b></td><td>'.$rowC['payment_status'].'</td></tr>';
			
				?>
			</table>

			
		</div>
		</div>
	</div>
</div>

</body>
</html>