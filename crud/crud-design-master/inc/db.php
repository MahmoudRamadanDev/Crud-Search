<?php


$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "crud_php_mysql";

// Create connection 
$conn = mysqli_connect($serverName , $userName , $password , $dbname);

// Check connection
if (!$conn) {
die("Could not connect to" . mysqli_connect_error());
}

