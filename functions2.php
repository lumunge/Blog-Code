<?php

define('DBINFO','mysql:host=localhost;dbname=admin');
define('DBUSER', 'root');
define('DBPASS', '');


function fetchAll($query){
    $conn = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $conn->query($query);
    return $stmt -> fetchAll();
}


function performQuery($query){
    $conn = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $conn -> prepare($query);

    if($stmt -> execute()){
        return true;
    }else{
        return false;
    }
}


?>
