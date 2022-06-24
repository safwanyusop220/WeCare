<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "wecare";
$port = 3301;



// Create connection
// $conn = new mysqli($servername, $db_username, $db_password, $database, $port);

$conn = mysqli_connect('localhost', 'root', '', 'wecare');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?> 