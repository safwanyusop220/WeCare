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

    <body style="background-color: #98D4D2 ;">

    <nav>
        <a href="admin-dashboard.php">
            <img src="../images/logo.png" id="logo" >
        </a>
    <div class="navButtonGroup" >
        <?php
        ?>
        <a href="admin-userList.php" class="static">USER LIST</a>
        <a href="request.php" class="static">REQUEST LIST</a>
        <a href="requestList.php" class="static">REQUEST APPROVAL</a>
        <a href="../sql/logout.php" class="highlighted">LOGOUT</a>

    </div>
</nav>

        <!-- <div class="articleWrap"> -->
            <article >
                <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card" >
                            <div class="card-body">
                                <h1 class="text-center" style="background:none; color: black; text-center">User List</h1>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="scroll-vertical-preview alt-pagination-preview">
                                        <table id="scroll-vertical-datatable" class="table table-hover dt-responsive nowrap w-100">
                                            <thead style="background-color:#1d2832; color:white;">
                                                <tr>
                                                <th style="font-size:17px; width:2%; text-align:center;">User Id</th>
                                                <th style="font-size:17px; width:5%;  ">Fullname</th>
                                                <th style="font-size:17px; width:5%;  ">Email</th>
                                                <th style="font-size:17px; width:5%;  ">Phone</th>
                                                <th style="font-size:17px; width:2%;  ">Gender</th>
                                                <th style="font-size:17px; width:10%; ">Location</th>
                                                </tr>
                                            </thead>   
                                            <?php
                                                //Query
                                                $sql = "SELECT * FROM user";
                                                $result = mysqli_query( $conn, $sql);
                                                $resultCheck = mysqli_num_rows ($result);

                                                if ($resultCheck > 0){
                                                    
                                                    // Get Data
                                                    while ($row = mysqli_fetch_assoc($result)){

                                                        // Get Data
                                                        //Declaration
                                                        $user_id = $row["user_id"];
                                                        $fullname = $row["fullname"];
                                                        $email = $row["email"];
                                                        $phone = $row["phone"];
                                                        $gender = $row["gender"];
                                                        $location = $row["location"];
                                            ?>                    
                                            <tbody>
                                            <tr>
                                                <td style="font-size:17px; width:2%; text-align:center; text-decoration:none;"><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold"><?=$user_id?></a> </td>
                                                <td style="font-size:17px; width:1%; "><?=$fullname?> </td>
                                                <td style="font-size:17px; width:5%; "><?=$email?></td>
                                                <td style="font-size:17px; width:5%; "><?=$phone?></td>
                                                <td style="font-size:17px; width:2%; "><?=$gender?></td>
                                                <td style="font-size:17px; width:10%; "><?=$location?></td>
                                            </tr>
                                            </tbody>
                                            <?php      
                                                    }          
                                                }
                                                else{
                                                    // If error
                                                    // echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-dashboard.php'</script>";
                                                }
                                            ?>
                                        </table>                     
                                    </div> <!-- end preview-->
                                </div> <!-- end tab-content-->

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                </div>
            </article>
            <!-- <div class="waveWrapper">
                <img src="../images/volunteer.png"/>
            </div>  -->
        <!-- </div> -->
    </body>
</html>