<?php
?>
<!DOCTYPE html5>
<html>

<head>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
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
                <?php echo "<a href='request.php?id=".$sessionUserId."' class='highlighted'>REQUEST</a>"?>
                <?php echo "<a href='profile.php?id=".$sessionUserId."' class='highlighted'>PROFILE</a>"?>
                <a href="../sql/logout.php" class="highlighted">LOGOUT</a>

            </div>
        </nav>
    <div class="articleWrap">
        <article>
            <h1>ABOUT WECARE</h1><br>

            <p align="justify">WeCare is a platform for those who are requiring help while self-quarantine while tested positive with
                covid-19 and for those with the intention of volunteering. Users may choose to require help on our platform which
                would be accepted by other users. This would greatly encourage the practice of self-quarantine while tested positive and keep everyone safe.<br><br>

                To further encourage accepting request, we would also split the request profits with the volunteers as
                an incentive.<br><br>

                We welcome anyone who needs help or with the intention
                to help to join our platform.</p>


        </article>
        <div class="waveWrapper">
            <img src="../images/logo.png" />
        </div>
    </div>
</body>

</html>