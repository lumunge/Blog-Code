<html>
<head>
<title>Mafundi Search</title>
</head>
<body>
<?php 

$exp = $_POST["exp"];

$conn = new mysqli("localhost", "root", "", "phpmyadmin");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM technician WHERE expertise ='" . $exp . "'";

$result = $conn->query($sql);
echo "The service requested :- " . $exp;

if ($result ->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo  "<br/>City: " . $row["exp"];
    }
} 
else {
    echo "<h2>No such service exists at mafundi</h2>";
}

$conn->close();
?>
</body>
</html>