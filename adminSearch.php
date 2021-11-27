<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Mafundi Search Page.</title>
<link rel="stylesheet" href="css/adminsearch.css">
</head>
<body>
<main>

<section class="landing">

<div id="fundiSearch">

<form action="" method="POST">
<input type="text" name="fundi" placeholder="Fundi's name...">
<button type="submit" name="fundisearch"  >Search Fundi.</button>
</form>

<table>
<tr>
<th>Username</th>
<th>Contact</th>
<th>Email</th>
<th>Location</th>
<th>Profession</th>
<th>Date</th>
</tr>
<?php
include 'searchy2.php';

$query = "SELECT * FROM `techaccounts` ";
$param = [];

if(isset($_POST['fundisearch']) && !empty($_POST['fundi'])){
$colsToMatch = ['techusername', 'phone', 'email', 'location', 'profession', 'date'];

$where = [];

$fundi = $_POST['fundi'];
foreach($colsToMatch as $col){
$where[] = "$col LIKE ?";
$param[] = "%$fundi%"; //wildcard percentege finds all data in the database.
}

$query .= "WHERE ".implode(" OR ", $where);
}

foreach(DB::getEm($query, $param) as $row){
?>
<tr>
<td> <?php echo $row['techusername']?> </td>
<td> <?php echo $row['phone']?> </td>
<td> <?php echo $row['email']?> </td>
<td> <?php echo $row['location']?> </td>
<td> <?php echo $row['profession']?> </td>
<td> <?php echo $row['date']?> </td>
</tr>
<?php
}


?>
</table>
</div>



<div id="customerSearch">

<form action="" method="POST">
<input type="text" name="client" placeholder="Client's name...">
<button type="submit" name="clientsearch">Search Customer.</button>
</form>

<table>
<tr>
<th>Username</th>
<th>Type</th>
<th>Amount</th>
<th>Mpesa Code</th>
<th>Date</th>
</tr>
<?php
include 'clientsearch.php';

$query = "SELECT * FROM `accounts` ";
$param = [];

if(isset($_POST['clientsearch']) && !empty($_POST['client'])){
$colsToMatch = ['username', 'type', 'mpesa', 'amount', 'date'];

$where = [];

$client = $_POST['client'];
foreach($colsToMatch as $col){
$where[] = "$col LIKE ?";
$param[] = "%$client%"; //wildcard percentege finds all data in the database.
}

$query .= "WHERE ".implode(" OR ", $where);
}

foreach(DAB::getEm($query, $param) as $row){
?>
<tr>
<td> <?php echo $row['username']?> </td>
<td> <?php echo $row['type']?> </td>
<td> <?php echo $row['amount']?> </td>
<td> <?php echo $row['mpesa']?> </td>
<td> <?php echo $row['date']?> </td>
</tr>
<?php
}


?>
</table>
</div>

<div id="paymentsSearch">

<form action="" method="POST">
<input type="number" name="payment" placeholder="Amount...">
<button type="submit" name="paymentsearch">Search Payment.</button>
</form>

<table>
<tr>
<th>Customer Contact</th>
<th>Service</th>
<th>Mpesa Code</th>
<th>Amount</th>
<th>Date</th>
</tr>
<?php
include 'paymentsearch.php';

$query = "SELECT * FROM `approvedpayments` ";
$param = [];

if(isset($_POST['paymentsearch']) && !empty($_POST['payment'])){
$colsToMatch = ['phone', 'service', 'mpesa', 'amount', 'date'];

$where = [];

$payment = $_POST['payment'];
foreach($colsToMatch as $col){
$where[] = "$col LIKE ?";
$param[] = "%$payment%"; //wildcard percentege finds all data in the database.
}

$query .= "WHERE ".implode(" OR ", $where);
}

foreach(DABO::getEm($query, $param) as $row){
?>
<tr>
<td> <?php echo $row['phone']?> </td>
<td> <?php echo $row['service']?> </td>
<td> <?php echo $row['mpesa']?> </td>
<td> <?php echo $row['amount']?> </td>
<td> <?php echo $row['date']?> </td>
</tr>
<?php
}


?>
</table>
</div>


<div id="servicesSearch">

<form action="" method="POST">
<input type="text" name="service" placeholder="Service name...">
<button type="submit" name="servicesearch">Search Services.</button>
</form>

<table>
<tr>
<th>Service</th>
<th>Ordered By</th>
<th>Location</th>
<th>Email</th>
<th>Phone</th>
<th>Date</th>
</tr>
<?php
include 'servicesearch.php';

$query = "SELECT * FROM `bookings` ";
$param = [];

if(isset($_POST['servicesearch']) && !empty($_POST['service'])){
$colsToMatch = ['username', 'service', 'location', 'house_name', 'phone', 'date'];

$where = [];

$service = $_POST['service'];
foreach($colsToMatch as $col){
$where[] = "$col LIKE ?";
$param[] = "%$service%"; //wildcard percentege finds all data in the database.
}

$query .= "WHERE ".implode(" OR ", $where);
}

foreach(DABI::getEm($query, $param) as $row){
?>
<tr>
<td> <?php echo $row['service']?> </td>
<td> <?php echo $row['username']?> </td>
<td> <?php echo $row['location']?> </td>
<td> <?php echo $row['house_name']?> </td>
<td> <?php echo $row['phone']?> </td>
<td> <?php echo $row['date']?> </td>
</tr>
<?php
}


?>
</table>
</div>

</div>
</main>
</body>
</html>