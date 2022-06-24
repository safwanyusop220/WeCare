<?php
    include "../sql/config.php";
    include "../sql/session.php";

    $supplyDesc         = $_POST['supplyDesc'];
    $numPeople          = $_POST['numPeople'];
    $quarantineDuration = $_POST['quarantineDuration'];
    $location           = $_POST['location'];
    $sessionUserId      = $_POST['requestBy'];
    $requestName        = $_POST['requestName'];
    $requestPhone       = $_POST['requestPhone'];

    
    $stmt = $conn->prepare('INSERT INTO `request_supply` (supplyDesc, numPeople, quarantineDuration, `location`, requestBy, requestName, requestPhone)
    VALUES(?, ?, ?, ?, ?, ?, ?)');

    $stmt->bind_param("sssssss", $_POST['supplyDesc'], $_POST['numPeople'], $_POST['quarantineDuration'], $_POST['location'], $_POST['requestBy'], $_POST['requestName'], $_POST['requestPhone']);
    $stmt->execute();

    echo "<script>alert('Successfully send request');window.location.href='../user/user-dashboard.php'</script>";


?>