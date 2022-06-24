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
                <h1>Connecting People in</h1>
                <h1>Times of Needs</h1>

                <p>WECARE PROVIDES A PLATFORM FOR THOSE</p>
                <p>WHO HAVE TESTED COVID POSITIVE TO REQUEST HELP</p>
                <p>WHILE THEY KEEP EVERYONE SAFE BY SELF-</p>
                <p>QUANRANTINE</p>

                <a href="aboutUs.php" class="learnMoreButton highlighted">LEARN MORE</a>
            </article>
            <div class="waveWrapper">
                <img src="../images/volunteer.png"/>
            </div>
        </div>
    </body>
</html>