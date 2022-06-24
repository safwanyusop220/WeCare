<?php
?>
<!DOCTYPE html5>
<html>

<head>
    <link rel="stylesheet" href="../css/styles.css">
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