<h1>Customer Requests</h1>

<?php
    include("functions.php");

    $id = $_GET['id'];

    $query = "UPDATE `bookings` SET ` status` = 'read' WHERE `id` = '$id';";
    performQuery($query);

    $query = "SELECT* FROM `bookings` WHERE `id` = $id";

    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $i){
            if($i['type'] == 'unread'){
                echo ucfirst($i['username'])."Asks to Join Mafundi <br>";
            }
        }
    }
    
?>