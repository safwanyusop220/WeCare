<?php

$servername = 'localhost';
$username = 'b031910120';
$password = 'abc1619';
$dbname = "student_b031910120";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//Check connection
if(!$conn)
{
	die("connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully"

?>