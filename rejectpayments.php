<?php
include 'functions2.php';
?>

<?php
// include('functions.php');

$id = $_GET['id'];

$query = "DELETE FROM `partialpayments` WHERE `partialpayments`.`id` = '$id';";
    if(performQuery($query)){
        echo "Thank you for staying with mafundi we will follow up on this payment.";
    }else{
        echo "An error has occured";
    }
?>
<a href="customerDashBoard.php">Back</a>