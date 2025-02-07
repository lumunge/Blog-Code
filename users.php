<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add User Profile</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="addusers.php" method="POST">

<div class="modal-body">

<div class="form-group">
<label> Username </label>
<input type="text" name="username" class="form-control" placeholder="Enter Username">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter Password">
</div>
<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
</div>

<input type="hidden" name = "usertype" value = "admin">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>


<div class="container-fluid">

<!-- DataTables Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Users Profile
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
Add User Profile 
</button>
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
$query = "SELECT * FROM accounts";
$query_run = mysqli_query($conn, $query);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>ID</th>
<th>Username</th>
<th>Date</th>
<th>User Type</th>
<th>EDIT </th>
<th>DELETE </th>
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
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['type']; ?></td>
<td>
    <!-- register_edit.php -->
<form >
<input type="hidden">
<button class="btn btn-success disabled"> EDIT</button>
</form>
</td>

<td>
<!-- code.php -->
<form action="deleteuser.php" method="POST">
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