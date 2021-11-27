<?php
    include('functions2.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM `partialpayments` WHERE `id` = '$id';";

    if(count(fetchAll($query)) > 0){
    foreach(fetchAll($query) as $row){
        $phone = $row['phone'];
        $service = $row['service'];
        $mpesa = $row['mpesa'];
        $amount = $row['amount'];
        $date = $row['date'];

        $query = "INSERT INTO `approvedpayments` (`phone`, `service`, `mpesa`, `amount`, `date`) VALUES ('$phone', '$service', '$mpesa', '$amount', '$date');";
    }

    if(performQuery($query)){
        echo "Success <br> <br>";
    }else{
        echo "An error has occured";
    }

    $query = "DELETE FROM `partialpayments` WHERE `partialpayments`.`id` = '$id';";
    if(performQuery($query)){
        echo "The Payment Approval Was Successful, Thankyou For Staying With MAfundi Services. <br> <br>";
    }else{
        echo "An error has occured";
    }
}else{
    echo "An Error Occured";
}
?>
<a href="pendingpayments.php">Back</a>