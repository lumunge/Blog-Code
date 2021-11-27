<?php

class DABI{
    function conn(){
        $host = 'localhost';
        $db = 'admin';
        $user = 'root';
        $pass = '';

        return new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    }

    function getEm($query, $param = []){
        $stmt = DB::conn() -> prepare($query);
        $stmt -> execute($param);

        return $stmt -> fetchAll();
    }
}

?>