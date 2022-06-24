<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION["role"])){
        header("index.php");
    }
    else{
        if(isset($_POST["registerSubmit"])){
            require("database/config.php");
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "INSERT INTO `user` (`email`, `password`, `role`)VALUES ('$email', '$password', 'user')";
            // Only applicable to insert, update, delete (query that do not retrieve from database)
            $result = mysqli_query($conn,$sql);
            if(!$result){
            // if($conn->query($sql) === TRUE){
                $last_id = $conn->insert_id;
                $_SESSION["role"] = "user";
                $_SESSION["id"] = $last_id;

                $message = "Register successfully!";
                $url = "index.php";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }else{
                // $message = "Register failed!";
                $message = $conn->error;
                $url = "register.php";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }
        }
    }
?>



<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
            require("navBar.php");
        ?>
        <div class="greenFormWrap">
            <form class ="loginForm" method="POST" action="register.php">
                <p>Email:</p>
                <input type="text" id="email" name="email" placeholder="Enter your email">
                <p>Password:</p>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <p>Confirm Password:</p>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password">
                <div class = "centerButtonGroup">
                    <input type="submit" id="registerSubmit" name="registerSubmit" value="REGISTER"><br>
                    <a href="login.php">Already have an account? Login Now!</a>
                </div>
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

