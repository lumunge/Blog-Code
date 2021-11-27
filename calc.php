<?php

include('dbconfig.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT SUM(amount) AS value_sum FROM approvedpayments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "sum is : " . $row["value_sum"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>