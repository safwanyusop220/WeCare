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
            <h1>OUR MEMBERS</h1><br>

            <p align="justify">Our member consist of 4 students from Universiti Teknikal Malaysia Melaka (UTeM). This is a group project
                for the subject Web Application Development. The members are as following:</p>
            <br>
            <ul>
                <li>Cecilia Chong Ching Nee</li>
                <li>Abdillah Safwan bin Yusop</li>
                <li>Nur Ezza Jeslin Chua bin Jamil Chua</li>
                <li>Nur Sabrina Aina Binti Dzulkifli</li>
            </ul>
        </article>
        <div class="waveWrapper">
            <img src="../images/group_photo.jpeg" />
        </div>
    </div>
</body>

</html>