<?php
    include('functions.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM `users` WHERE `id` = '$id';";

    if(count(fetchAll($query)) > 0){
    foreach(fetchAll($query) as $row){
        $username = $row['username'];
        $mpesa = $row['mpesa'];
        $amount = $row['amount'];
        $hashed_password = $row['password'];
        $date = $row['date'];

        $query = "INSERT INTO `accounts` (`id`, `username`, `type`, `mpesa`, `amount`, `password`, `date`) VALUES (NULL, '$username', 'user', '$mpesa', '$amount', '$hashed_password', '$date');";
    }

    if(performQuery($query)){
        echo "Account Approval Was Successful";
    }else{
        echo "An error has occured";
    }

    $query = "DELETE FROM `users` WHERE `users`.`id` = '$id';";
    if(performQuery($query)){
        echo "Account Approval Was Successful";
    }else{
        echo "An error has occured";
    }
}else{
    echo "An Error Occured";
}
?>
<a href="index.php">Back</a>