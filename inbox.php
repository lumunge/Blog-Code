<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTables Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<a href="inbox.php" class="inline-block btn btn-sm btn-warning shadow-sm lead text-dark"> Customers Messages. <i
class="fa fa-envelope text-dark"></i></a>
<a href="techmessages.php" class="inline-block btn btn-sm btn-warning shadow-sm ml-2 lead text-dark"> Technician Messages. <i
class="fa fa-envelope text-dark"></i></a>
</div>

<div class="card-body">

<div class="table-responsive">
<!--Retrieving data to the table from the database.-->
<?php
$conn = mysqli_connect("localhost", "root", "", "admin");
$query = "SELECT * FROM adminmessages";
$query_run = mysqli_query($conn, $query);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th> Message Id </th>
<th> Username </th>
<th>Message</th>
<th>Time Stamp</th>
<th>REPLY </th>
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
<td><?php echo $row['msg_id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['message']; ?></td>
<td><?php echo $row['date']; ?></td>
<td>
<form action="replymessages.php" method="POST">
<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
<button  type="submit" name="edit_btn" class="btn btn-success"> REPLY </button>
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