<?php

$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];

//Database connection
$conn = new mysqli('localhost', 'root', '', 'wecare');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare('INSERT INTO `volunteer` (email, `password`, fullname, phone)
    VALUES(?, ?, ?, ?)');
    // var_dump("sini");
    // exit();
    $stmt->bind_param("ssss", $_POST['email'], $_POST['password'], $_POST['fullname'], $_POST['phone']);
    $stmt->execute();
    echo "<script>alert('Successfully registered account, please login');window.location.href='../index.php'</script>";

}
?>