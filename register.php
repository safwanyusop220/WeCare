
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
        <?php echo "<a style='color:#194E8C; border-radius: 45px; margin-left:64%; padding: 2% 5%; font-size: 1.5em;'  href='registerVolunteer.php' class='highlighted'>Volunteer Registration</a>"?>
        <div class="greenFormWrap">
            
            <form class ="loginForm" method="POST" action="sql/registerUser.php">
                <h1 >Covid-19 Patient Registration</h1>

                <p>Fullname:</p>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your fullname">
                
                <p>Phone:</p>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone">

                <p>Gender:</p>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">female</label><br>

                <input type="radio" id="male" name="gender" value="male">
                <label for="male">male</label><br>

                <p>Email:</p>
                <input type="text" id="email" name="email" placeholder="Enter your email">

                <p>Address:</p>
                <span class="font-13 " style="color:black; ">  e.g : The Height Residence</span>
                <input type="text" id="location" name="location" placeholder="Enter your location">


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

