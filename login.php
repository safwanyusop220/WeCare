<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <nav>
            <a href="index.php">
                <img src="images/logo.png" id="logo" >
            </a>

            <div class="navButtonGroup">
                <?php
                ?>
                <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
                <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
                <a href="login.php" class="highlighted">LOGIN</a>
                <a href="register.php" class="highlighted">REGISTER</a>

            </div>
        </nav>
        <div class="greenFormWrap">
            <form class ="loginForm" method="POST" action="sql/loginSql.php">
                <p>Email:</p>
                <input type="email" id="email" name="email" onchange="validateEmail()" placeholder="Enter your email" required>
                <p>Password:</p>
                <input type="password" id="password" name="password" onchange="validatePassword()" placeholder="Enter your password" required>
                <div class = "centerButtonGroup">
                    <input type="submit" id="loginSubmit" name="loginSubmit" value="LOGIN"><br>
                    <a href="register.php">Don't have an account? Register Now!</a>
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

            // Minimum eight characters, at least one letter and one number:
            var passwordFormat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if(passwordInput.value.match(passwordFormat)){
                return true;
            }else{
                alert("Password must be minimum eight characters, at least one letter and one number");
                return false;
            }
        }

        var test = document.getElementById("loginSubmit");

        test.addEventListener("click", function(event){
            if(!validateEmail() || !validatePassword()){
                alert("Invalid inputs. Please try again")
                event.preventDefault();
            }
        });

    </script>
</html>