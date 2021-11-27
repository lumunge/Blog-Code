<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    .error{
      color: #FF0000;
    }
  </style>
</head>
<body>
<?php

  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "phpmyadmin";

  //Defining variables and setting to empty values.
  $nameErr = $phoneErr = $emailErr = "";
  $name = $phone = $email = $service = $location = $floorno = $houseno = $time = $date = $addesc = "";

  $conn = new mysqli("localhost", "root", "", "phpmyadmin");

if($conn -> connect_error)
{
die("Connection Failed!!" . $conn -> connect_error);
}

  //Conditionals Validating Name.
  if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty($_POST["name"])){
  $nameErr = "Your name is required! ";
 }else{
   $name = testy($_POST["name"]);
   if(!preg_match("/^[a-zA-Z]*$/", $name)){
    $nameErr = "Only letters and white spaces allowed";
   }
  }
 //Validate Phone.
 if(empty($_POST["phone"]))
 {
  $phoneErr =  "Enter your number for contacting purposes!";
 }else{
  $phone = testy($_POST["phone"]);
 }
 //Validating Email
 if(empty($_POST["email"]))
 {
  $emailErr = "Your email is required!";
 }else
 {
  $email = testy($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $emailErr = "Invalid email address!";
  }
  }
 //Validating Commment Section
 if(empty($_POST["comment"]))
 {
  $comment = "";
 }else{
  $comment = testy($_POST["comment"]);
 }
}
  function testy($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $sql = "INSERT INTO customerdetailz VALUES('".
$name     ."','".
$phone    ."','".
$email     ."','".
$service   ."','".
$location    ."','".
$floorno   ."','".
$houseno   ."','".
$time     ."','".
$date     . "')";


if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
 </body>
</html>