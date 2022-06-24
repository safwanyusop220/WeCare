<?php

$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$location = $_POST['location'];

//Database connection
$conn = new mysqli('localhost', 'root', '', 'wecare');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare('INSERT INTO `user` (email, `password`, fullname, phone, gender, `location`)
    VALUES(?, ?, ?, ?, ?, ?)');
    // var_dump("sini");
    // exit();
    $stmt->bind_param("ssssss", $_POST['email'], $_POST['password'], $_POST['fullname'], $_POST['phone'], $_POST['gender'], $_POST['location']);
    $stmt->execute();
    echo "<script>alert('Successfully registered account, please login');window.location.href='../index.php'</script>";

}
?>