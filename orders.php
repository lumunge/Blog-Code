<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTables Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">ORDERS
</h6>
</div>

<div class="card-body">
<!--CODE TO PROVIDE THE STAUTUSES AND THE SUCCESSES-->
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

<div class="table-responsive">
<!--Retrieving data to the table from the database.-->
<?php
$conn = mysqli_connect("localhost", "root", "", "admin");
$query = "SELECT * FROM bookings";
$query_run = mysqli_query($conn, $query);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>ID</th>
<th>Username </th>
<th>Service </th>
<th>Location </th>
<th>Hse_Name </th>
<th>Hse_Number</th>
<th>Email</th>
<th>Phone</th>
<th>Date</th>
<th>Add_Desc</th>
<th>ACTION </th>
</tr>
</thead>
<tbody>
<!--Table from which values will be retrieved to a text box in register_edit.php-->
<?php
if(mysqli_num_rows($query_run) > 0)
{
while($row = mysqli_fetch_assoc($query_run))
{
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['service']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['house_name']; ?></td>
<td><?php echo $row['house_number']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['addDescription']; ?></td>
<td>
<form action="deleteorders.php" method="POST">
<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
</form>
</td>
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
</div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>