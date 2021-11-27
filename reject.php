<?php
include 'functions.php';
?>

<?php
// include('functions.php');

$id = $_GET['id'];

$query = "DELETE FROM `users` WHERE `users`.`id` = '$id';";
    if(performQuery($query)){
        echo "Your Registration has been rejected please contact the admin via telephone";
    }else{
        echo "An error has occured";
    }
?>
<a href="index.php">Back</a>