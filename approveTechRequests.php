<?php
include('functions.php');

$id = $_GET['id'];

$query = "SELECT * FROM `technician` WHERE `id` = '$id';";

if(count(fetchAll($query)) > 0){
foreach(fetchAll($query) as $row){
$techusername = $row['techusername'];
$phone = $row['phone'];
$email = $row['email'];
$location = $row['location'];
$profession = $row['profession'];
$hashed_password = $row['password'];
$date = $row['date'];

$query = "INSERT INTO `techaccounts` (`id`, `techusername`, `phone`, `email`, `location`, `profession`, `password`, `date`) VALUES (NULL, '$techusername', $phone, '$email', '$location', '$profession', '$hashed_password', '$date');";
}

if(performQuery($query)){
echo "Account Approval Was Successful";
}else{
echo "An error has occured";
}

$query = "DELETE FROM `technician` WHERE `technician`.`id` = '$id';";
if(performQuery($query)){
echo "Account Approval Was Successful";
}else{
echo "An error has occured";
}
}else{
echo "An Error Occured";
}
?>
<a href="pendingTechRequests.php">Back</a>