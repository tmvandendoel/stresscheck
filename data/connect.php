<?php
$server = "localhost";
$username = "root";
$password = "henk";

$conn = new mySQLi($server,$username,$password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>