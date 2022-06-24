<?php
include "../sql/config.php";
?>
<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="../css/styles.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body onload="getLocation();" style="background-color: #98D4D2 ;">
        <nav>
            <a href="user-dashboard.php">
                <img src="../images/logo.png" id="logo" >
            </a>
            <div class="navButtonGroup">
                <?php
                    include "../sql/session.php";
                    $sessionUserId   = $_SESSION['user_id'];
                ?>
                <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
                <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
                <a href="volunteer.php" class="highlighted">VOLUNTEER</a>
                <?php echo "<a href='request.php?id=".$sessionUserId."' class='highlighted'>REQUEST</a>"?>

            </div>
        </nav>
        <div class="greenFormWrap">

        <form action="getLocation.php" method="POST" id="signfrm"  enctype="multipart/form-data">
    <input type="hidden" name="latitude" value="" id="lt" />
    <input type="hidden" name="longitude" value="" id="lg" />
    <button type="submit" class="btn btn-primary" id="sign-frm-input-btn">Mandar Coordenadas</button>
</form>

<script>
    function getLocation() {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    function showPosition(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        document.getElementById('lt').value = lat;
        document.getElementById('lg').value = lon;
    }
</script>

            <h1 style="color:white;">VOLUNTEER - REQUEST LIST</h1>
            <?php
                //Query
                $sql = "SELECT * FROM request_supply";
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
            ?>


                    <form>
                    <div class="row">
                        <div class="col">
                        <input class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                        <input class="form-control" placeholder="Last name">
                        </div>
                        <div class="col">
                        <input class="form-control" placeholder="Last name">
                        </div>
                        <div class="col">
                        <input class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    </form>

                    



                    <input style="border:none; border-radius: 1px;" type="text" id="supplyDesc" name="supplyDesc" value="<?=$supplyDesc?>" readonly>
                    <?php
                     }
                }
                        else{
                                // If error
                                echo "<script>alert('Sorry, there are no data exist');window.location.href='user-dashboard.php'</script>";
                            }
                    ?>
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

