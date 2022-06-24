<?php
    include "../sql/config.php";
    include "../sql/session.php";

    if (isset($_POST["Locate"])){

        $locationName         = $_POST['locationName'];
        $userRequestId        = $_POST['userRequestId'];
        // $locationId           = $_POST['locationId'];
    
        
        $stmt = $conn->prepare('INSERT INTO `location` (locationName, userRequestId)
        VALUES(?,?)');
    
        $stmt->bind_param("si", $_POST['locationName'], $_POST['userRequestId']);
        $stmt->execute();
    
        echo "<script>alert('Successfully get location');window.location.href='../user/request.php?id=".$userRequestId."&locationName=".$locationName."'</script>";

    }
    

?>