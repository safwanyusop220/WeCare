<?php
    include "../sql/config.php";

    //Declaration
    $sessionFullname = "";
    $sessionPhone = "";
    $sessionEmail = "";
    $sessionPassword = "";

    $fullname = "";
    $password = "";
    $email = "";
    $phone = "";

    if (isset($_GET["id"])){

        // Declaration
        $id = $_GET["id"];

        // Get Data
        $sql = "select * from volunteer where volunteerId = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $fullname       = $row["fullname"];
        $password       = $row["password"];
        $email          = $row["email"];
        $phone          = $row["phone"];

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $sessionUserId    = trim( $_POST["volunteerId"]);
        $fullname         = trim( $_POST["fullname"]);
        $password         = trim( $_POST["password"]);
        $email            = trim( $_POST["email"]);
        $phone            = trim( $_POST["phone"]);


        //Query
        $sql = "UPDATE volunteer SET fullname=?, `password`=?,  email=?, phone=?  WHERE `volunteerId`=?" ;
        $stmt = mysqli_prepare($conn, $sql);

        //Bind 
        mysqli_stmt_bind_param($stmt, "ssssi", $fullname, $password, $email, $phone, $sessionUserId );

        //execute
        if (mysqli_stmt_execute ($stmt)){

            echo "<script>alert('Successfully update profile');window.location.href='volunteer-dashboard.php'</script>";
        }
        else {

            echo "<script>alert('Sorry, your databse problem ');window.location.href='profile.php'</script>";
        }
        
    }

?>


<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="../css/css.css">
    </head>
    <body>
        <nav>
            <a href="Volunteer-dashboard.php">
                <img src="../images/logo.png" id="logo" >
            </a>
            <div class="navButtonGroup">
                <?php
                    include "../sql/sessionVolunteer.php";
                    $sessionUserId   = $_SESSION['volunteerId'];
                ?>
                <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
                <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
                <?php echo "<a href='jobs.php?id=".$sessionUserId."' class='highlighted'>JOBS</a>"?>
                <?php echo "<a href='viewAcceptJobs.php?id=".$sessionUserId."' class='highlighted'>VIEW</a>"?>
                <?php echo "<a href='profileVolunteer.php?id=".$sessionUserId."' class='highlighted'>PROFILE</a>"?>
                <a href="../sql/logout.php" class="highlighted">LOGOUT</a>

            </div>
        </nav>


        <div class="greenFormWrap">
        <h1 style="color:#F9E55C;">Update Profile</h1>
            <form  class="updateProfile" action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                <table>
                
                    <tr>
                    <input type="hidden"   name="volunteerId" value="<?=$sessionUserId?>">
                        <th>Name</th>
                        <td>
                            <input type="text"  name="fullname" style="width: 450px;" value="<?=$fullname?>">
                        </td>
                    </tr>

                    <tr>
                        <th>Email Address</th>
                        <td>
                            <input type="text" name="email" style="width: 450px;" value="<?=$email?>">
                        </td>
                    </tr>

                    <tr>
                        <th>Phone Number</th>
                        <td>
                            <input type="text" name="phone" style="width: 450px;" value="<?=$phone?>">
                        </td>
                    </tr>

                    <tr>
                        <th>Password</th>
                        <td>
                            <input type="text"  name="password" style="width: 450px;" value="<?=$password?>">
                        </td>
                    </tr>

                    <div class = "centerButtonGroup">

                    </div>

                    <tr>
                        <td colspan="2" align="center"> 
                            <input style="background-color: #F9E55C;" 
                            type="submit" id="updateSubmit" name="updateSubmit" value="Update"><br></a>
                        </td>
                    </tr>
                    

                </table>
             </form>

        </div>
    </body>
    <script type="text/javascript">
        function validateEmail(){
            var emailInput = document.getElementById("email");
            var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(emailInput.value.match(mailFormat)){
                return true;
            }else{
                alert("Please enter a valid email address");
                return false;
            }
        }

        function validatePassword(){
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("confirm_password");

            // Minimum eight characters, at least one letter and one number:
            var passwordFormat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if(passwordInput.value.match(passwordFormat)){
                if(confirmPasswordInput.value === passwordInput.value){
                    return true;
                }else{
                    alert("Passwords does not match");
                    return false;
                }
            }else{
                alert("Password must be minimum eight characters, at least one letter and one number");
                return false;
            }
        }

        document.getElementById("registerSubmit").addEventListener("click", function(event){
            if(!validateEmail() || !validatePassword()){
                alert("Invalid inputs. Please try again")
                event.preventDefault();
            }
        });

    </script>
</html>

