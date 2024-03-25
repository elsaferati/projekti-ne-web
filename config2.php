<?php

$server = "localhost"; // Change this if MySQL is running on a different host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "userinfo"; 
$port = "4306";

$conn = mysqli_connect($server, $username, $password, $database,$port);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>