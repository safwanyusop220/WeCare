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
        $sql = "select * from request_supply where id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $id = $row["id"];
        $supplyDesc         = $row["supplyDesc"];
        $numPeople          = $row["numPeople"];
        $quarantineDuration = $row["quarantineDuration"];
        $requestBy          = $row["requestBy"];
        $status             = $row["status"];
        $requestName        = $row["requestName"];
        $requestPhone       = $row["requestPhone"];
        $location           = $row["location"];

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
        <a href="Volunteer-dashboard.php">
            <img src="../images/logo.png" id="logo" >
        </a>
        <div class="navButtonGroup">
            <?php
                include "../sql/sessionVolunteer.php";
                $sessionUserId   = $_SESSION['volunteerId'];
            ?>
                <a href="#" class="highlighted text-center">VOLUNTEER DASHBOARD</a>
                <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
                <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
                <?php echo "<a href='jobs.php?id=".$sessionUserId."' class='highlighted'>JOBS</a>"?>
                <?php echo "<a href='profileVolunteer.php?id=".$sessionUserId."' class='highlighted'>PROFILE</a>"?>
                <a href="../sql/logout.php" class="highlighted">LOGOUT</a>
        </div>
    </nav>
        <div class="greenFormWrap">
            
        <form class ="requestForm" method="POST" action="../sql/requestSql.php">
            <h1 style="color:white;">REQUEST HELP</h1>
                <div class="col-12">
                    <h3 style="color:white; margin-bottom: 5%; ">Search Your Quarantine Location</h3>
                        <input type="hidden" name="userRequestId" value="<?=$sessionUserId?>">
                </div>
                <?php echo "<a style='color:#194E8C; border-radius: 45px; padding: 2% 5%; font-size: 1.5em;'  href='jobs.php' class='highlighted'>Back</a>"?>
                <?php echo "<a style='color:#194E8C; border-radius: 45px; margin-left: 47%; padding: 2% 5%; font-size: 1.5em;'  href='acceptJobs.php?action=approve&id=".$id."&acceptBy=".$sessionUserId."' class='highlighted'>Accept Jobs</a>"?>

        
            <input style="border:none; width:100%; margin-top:7%; background-color: rgb(255, 255, 255);padding: 20px; border-radius: 25px; width:100%; margin-bottom: 5%; "  
                    type="text" id="location" value="<?=$location ?>" readonly name="location">

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

