<?php
session_start();
include('security.php');

$conn = mysqli_connect("localhost", "root", "", "admin");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO customerdetails (username, email, password) VALUES ('$username', '$email', '$password')";
        //Running the query.
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Thankyou for choosing Mafundi Services";
            header('Location: customerlogin.php');
            //echo "saved";
        }
        else
        {
            $_SESSION['status'] = "Administrator profile failed to update";
            header('Location: a.home.html');
        }
    }
    else
    {
        $_SESSION['status'] = "The passwords do not match";
        header('Location: a.home.html');
    }

}