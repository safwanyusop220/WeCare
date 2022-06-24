<?php
include "config.php";
session_start();

if(isset($_POST["loginSubmit"])){

    //get + set
    $email = $_POST["email"];
    $password = $_POST["password"];

    //sql query
    $query = "SELECT * FROM `admin` where email = '$email' && `password` = '$password'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);

        header("location: ../admin/admin-dashboard.php");
        
    }
    else{
         //sql query
         $query = "SELECT * FROM user WHERE email = '$email' AND `password` = '$password'";
         $result = mysqli_query($conn, $query);
         $resultCheck = mysqli_num_rows($result);
 
         if ($resultCheck > 0){
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user_id']  = $row['user_id'];
             $_SESSION['email']    = $row['email'];
             $_SESSION['fullname'] = $row['fullname'];
             $_SESSION['phone']    = $row['phone'];
             $_SESSION['password'] = $row['password'];
             $_SESSION['location'] = $row['location'];
             header("location: ../user/user-dashboard.php");
         
            }else{
                //sql query
                $query = "SELECT * FROM volunteer WHERE email = '$email' AND `password` = '$password'";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['volunteerId']  = $row['volunteerId'];
                    $_SESSION['email']    = $row['email'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['phone']    = $row['phone'];
                    $_SESSION['password'] = $row['password'];
                    header("location: ../volunteer/volunteer-dashboard.php");
                
                }else{
                    echo "<script>alert('The email Invalid or the password is wrong');window.location.href='../index.php'</script>";
                }
        }
    }
}
else{
    header("../index.php");
}






    
?>
