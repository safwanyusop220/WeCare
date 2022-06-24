<?php
//Database connection
$conn = mysqli_connect('localhost', 'root', '', 'wecare');

if ($conn == false)
{
    var_dump("database not connected");
    exit();
}
?>