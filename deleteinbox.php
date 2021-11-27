<?php

include('dbconfig.php');

//Deleting data.
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM adminmessages WHERE msg_id = '$id'";
    $query_run = mysqli_query($conn, $query); //Connecting to database and running the query.

    if(isset($_POST['deletebtn']))
    {
        $sweet = 'success';
        $feedback = "Your data was deleted successfully"; //Make sure the session is started.
        header('Location: inbox.php');
    }
    else
    {
        $_SESSION['status'] = "Your data was not deleted."; 
        header('Location: inbox.php');
    }
}

?>