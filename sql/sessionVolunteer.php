<?php
    session_start();

    if (empty($_SESSION['email'])){
        header("location: ../sql/logout.php");
    }

    else{
        $sessionUserId   = $_SESSION['volunteerId'];
        $sessionEmail    = $_SESSION['email'];
        $sessionFullname = $_SESSION['fullname'];
        $sessionPhone    = $_SESSION['phone'];
        $sessionPassword = $_SESSION['password'];


    }
?>