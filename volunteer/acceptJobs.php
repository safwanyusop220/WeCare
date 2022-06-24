<?php
include "../sql/config.php";
// include "../sql/secureStaff.php";

if(isset($_GET["action"])){

    if($_GET["action"] == "approve"){

        $acceptBy = $_GET["acceptBy"];

        
        $id = $_GET["id"];
        //Query
        $sql = "SELECT * FROM request_supply WHERE `id`='$id'";
        $result = mysqli_query( $conn, $sql);
        $resultCheck = mysqli_num_rows ($result);

        if ($resultCheck > 0){
            
            // Get Data
            while ($row = mysqli_fetch_assoc($result)){

                // Get Data
                //Declaration
                $id                 = $row["id"];
                $supplyDesc         = $row["supplyDesc"];
                $numPeople          = $row["numPeople"];
                $quarantineDuration = $row["quarantineDuration"];
                $requestBy          = $row["requestBy"];
                $status             = $row["status"];
                $requestName        = $row["requestName"];
                $requestPhone       = $row["requestPhone"];


                //Query
                $sql = "INSERT INTO acceptJoblist (supplyDesc, numPeople, quarantineDuration, requestBy, `status`, requestName, `requestPhone`)
                VALUE (?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "sssssss", $supplyDesc, $numPeople, $quarantineDuration, $requestBy, $status, $requestName, $requestPhone);


                if (mysqli_stmt_execute ($stmt)){
                echo "<script>alert('Delivery Jobs Has been Accepted!');window.location.href='jobs.php'</script>";
                $sql = "UPDATE request_supply SET `jobStatus`='Accepted'  WHERE id='$id'";
                $result = mysqli_query( $conn, $sql);
                $sql = "UPDATE request_supply SET `acceptBy`='$acceptBy'  WHERE id='$id'";
                $result = mysqli_query( $conn, $sql);
                }
                else {
                    echo "<script>alert('Sorry, your databse problem ');window.location.href='jobs.php'</script>";
                }
            }
        }
    }

}

if(isset($_GET["action"])){

    if($_GET["action"] == "decline"){
        $id = $_GET["id"];

        $sql = "UPDATE request_supply SET `status`='Reject' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Request Supply Has Successfully Rejected!');window.location.href='requestList.php'</script>";
        }
    }

}


?>

