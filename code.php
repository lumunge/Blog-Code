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
    $usertype = $_POST['usertype'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register (username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
        //Running the query.
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Administrator profile was added successfully";
            header('Location: register.php');
            //echo "saved";
        }
        else
        {
            $_SESSION['status'] = "Administrator profile failed to update";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "The passwords do not match";
        header('Location: register.php');
    }

}

//CODING FOR DATA RETRIEVAL.

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    

    $query = "SELECT * FROM register WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    //fetching data and displaying into one form.
}


//To update.
if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];    
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];


    $query = "UPDATE register SET username = '$username', email = '$email', password = '$password', usertype = '$usertypeupdate' WHERE id = '$id' ";
    $query_run = mysqli_query($conn, $query); //Connecting to database.

    if($query_run)
    {
        $_SESSION['success'] = "Your data was updated successfully"; //Make sre the session is started.
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your data update failure";
        header('Location: register.php');
    }
} 

//Deleting data.
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query); //Connecting to database and running the query.

    if(isset($_POST['delete_btn']))
    {
        $_SESSION['success'] = "Your data was deleted successfully"; //Make sure the session is started.
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your data was not deleted."; 
        header('Location: register.php');
    }
}

//LOGIN SYSTEM.
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill'];
    $password_login = $_POST['passwordd'];

    $query = "SELECT * FROM register WHERE email = '$email_login' AND password = '$password_login' ";
    $query_run = mysqli_query($conn, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');//Afterlogin it should go to index.php.
    }
    else if($usertypes['usertype'] == "user")
    {
        $_SESSION['username'] = $email_login;
        header('Location: a.home.php');
    }
    else
    {
        $_SESSION['status'] = 'Invalid credentials!';
        header('Location: login.php');
    }
}
?>