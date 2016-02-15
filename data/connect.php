<?php
function db_connect($db)
{
    $server = "localhost";
    $username = "root";
    $password = "henk";
    
    $conn = new mySQLi($server,$username,$password,$db);
    
    if ($conn->connect_error) {
        $GLOBALS["db_error"] = $conn->connect_error;
        return false;
    }
    else
    {
        return $conn;
    }
}
?>