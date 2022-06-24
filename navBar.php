<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<script type="text/javascript">
    function goHomePage(){

        <?php
          if(isset($_SESSION["role"])){
            if($_SESSION["role"] == "user"){
                ?>
                window.location.href = "index.php"; 

                <?php
            }else if ($_SESSION["role" == "admin"]){
                ?>
                window.location.href = "view_users.php";
                <?php
            }
          }else{
            ?>
            window.location.href = "index.php";
            <?php
          }
        ?>
    }
</script>

<nav>
    <img src="images/logo.png" id="logo" onclick="goHomePage()" />
    <div class="navButtonGroup">
        <?php
        if(isset($_SESSION["role"])){
            if($_SESSION["role"] == "user"){

            ?>
        <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
        <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
        <a href="#" class="highlighted">VOLUNTEER</a>
        <a href="#" class="highlighted">REQUEST</a>
        <a href="profile.php" class="highlighted">PROFILE</a>
        <a href="logout.php" class="highlighted">LOGOUT</a>

        <?php
            }else if($_SESSION["role"] == "admin"){
            ?>
        <a href="#" class="static">USER LIST</a>
        <a href="#" class="static">REQUEST LIST</a>
        <a href="#" class="static">ANALYTIC</a>
        <a href="logout.php" class="highlighted">LOGOUT</a>
        <?php
            }
            
        }else{
        ?>
        <a href="aboutUs.php" class="static">ABOUT OUR MEMBER</a>
        <a href="aboutWecare.php" class="static">ABOUT WECARE</a>
        <a href="login.php" class="highlighted">LOGIN</a>
        <a href="register.php" class="highlighted">REGISTER</a>
        <?php
        }
    ?>

    </div>
</nav>