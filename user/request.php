<?php
    include "../sql/config.php";
    // Declartion
    $locate = "UTeM";
    $locationName ="";
    $locationName1 = "";
    $sessionlocation = "";
    $test = "";
    $Nname = "";

    if (isset($_GET["id"])){

        // Declaration
        $id = $_GET["id"];

        // Get Data
        $sql = "select * from user where user_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $fullname       = $row["fullname"];
        $password       = $row["password"];
        $email          = $row["email"];
        $phone          = $row["phone"];
        $location       = $row["location"];

    }

?>
<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="../css/request.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body onload="getLocation();" style="background-color: #98D4D2 ;" >
        <nav>
            <a href="user-dashboard.php">
                <img src="../images/logo.png" id="logo" >
            </a>
            <div class="navButtonGroup">
                <?php
                    include "../sql/session.php";
                    $sessionUserId   = $_SESSION['user_id'];
                    // $sessionlocation = $_SESSION['location'];
                    $sessionPhone    = $_SESSION['phone'];
                ?>
                <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
                <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
                <?php echo "<a href='request.php?id=".$sessionUserId."' class='highlighted'>REQUEST</a>"?>

            </div>
        </nav>
        <div class="greenFormWrap">
            
        <form class ="requestForm" method="POST" action="../sql/requestSql.php">
            <h1 style="color:white;">REQUEST HELP</h1>
                <div class="col-12">
                    <h3 style="color:white; margin-bottom: 5%; ">Search Your Quarantine Location</h3>
                        <input type="hidden" name="userRequestId" value="<?=$sessionUserId?>">
                </div>
                <?php echo "<a style='color:#194E8C; border-radius: 45px; margin-left:34%; padding: 2% 5%; font-size: 1.5em;'  href='profile.php?id=".$sessionUserId."' class='highlighted'>Edit Address</a>"?>
            <input style="border:none; width:100%; margin-top:7%; background-color: rgb(255, 255, 255);padding: 20px; border-radius: 25px; width:100%; margin-bottom: 5%; "  
                    type="text" id="location" value="<?=$location ?>" readonly name="location" >

                    <input type="hidden" id="locationName2" name="locationNameView" onclick="this.value = ''">
                    <script>

                        function getAndSetVal()
                        {
                            var locationName1 = document.getElementById('locationName').value;
                            document.getElementById('locationName2').value = locationName1;

                            myframe.document.getElementById("locationValue").innerHTML = document.getElementById('locationName2').value = locationName1;

                        }

                        //get value
                        function getVal()
                        {
                            var locationName =  document.getElementById('locationName')[1].value;
                            alert(locationName);
                        }

                    </script>

                        <div class="card">
                            <div class="card-body">

                                <iframe
                                onload="loaded()" name="myframe"
                                    width="100%"
                                    height="450"
                                    style="border:0"
                                    loading="lazy"
                                    allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA-FuKFMW-k_rXWwHOz2cmoRvO4SpNoWNQ
                                        &q=<?= $location?>">
                                </iframe>
                        
                    </div>
                </div>


            
                <input type="hidden" id="requestBy"  name="requestBy" value="<?=$sessionUserId?>">
                <input type="hidden" id="requestName"  name="requestName" value="<?=$fullname?>">
                <input type="hidden" id="requestPhone"  name="requestPhone" value="<?=$phone?>">

                <div class="row">
                    <div class="col-12 mb-4">
                        <h3 style="color:white; ">What supplies do you need ?</h3>
                        <textarea style="border:none; width:100%; " type="text" id="supplyDesc" name="supplyDesc" placeholder="  describe what you need" rows="2"></textarea>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                    <h3 style="color:white;">Supply Quantity</h3>
                        <input type="text" class="form-control" id="numPeople" name="numPeople" placeholder="How many people need supplies?">
                        <span class="font-13 " style="color:white; ">e.g "10 Person"</span>
                    </div>
                    <div class="mb-3 col-md-6">
                    <h3 style="color:white;">Quarantine session</h3>
                        <input type="text" class="form-control" id="quarantineDuration" name="quarantineDuration" placeholder="When is the end of your quarantine session?">
                        <span class="font-13 " style="color:white; ">e.g "6 Days"</span>
                    </div>
                </div>

                <div class="button" >
                    <input style="margin-left:39%" type="submit" id="next" name="next" value="Submit"><br>
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

