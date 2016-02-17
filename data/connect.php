<?php
function db_connect()
{
    $server = "localhost";
    $username = "root";
    $password = "henk";
    $db = "test";
    //deze db veranderen in daadwerkelijke 
    
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
function getarray($sqloutput)
{
    $return;
    $i=0;
    while($row = $sqloutput->fetch_assoc())
    {
        $return[$i] = $row;
        $i++;
    }
    return $return;
}
?>