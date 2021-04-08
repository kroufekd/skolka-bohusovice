<?php

//server

$servername = 
$username = 
$password = 


//localhost
/*
$servername = "127.0.0.1";
$username = "root";
$password = "";
*/
// Create connection
$conn = new mysqli($servername, $username, $password, "zsbohusovicecz01");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
