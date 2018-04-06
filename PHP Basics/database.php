<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mydatabase";


$connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
mysqli_set_charset($connection,"utf8")
?>
