<?php
include "../sql/config.php";
?>
<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="../css/list.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">


    </head>

    <body style="background-color: #98D4D2 ;">

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

<div class="greenFormWrap">
            <h1 style="color:white;">VOLUNTEER - APPROVED REQUEST</h1>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">List Jobs To Delivery</h4>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="scroll-vertical-preview alt-pagination-preview">
                                    <table id="scroll-vertical-datatable" class="table dt-responsive nowrap w-100">
                                        <thead style="background-color:#1d2832; color:white;">
                                            <tr>
                                            <th style="width: 20px; font-size:13px; text-align:center;">ID</th>
                                            <th style="width: 150px; font-size:13px; ">Request By</th>
                                            <th style="width: 170px; font-size:13px; ">Supply Description</th>
                                            <th style="width: 170px; font-size:13px; text-align:center;">Quarantine Duration</th>
                                            <th style="width: 170px; font-size:13px; text-align:center;">Number Of People</th>
                                            <th style="width: 170px; font-size:13px; text-align:center;">Phone Number</th>
                                            <th style="width: 140px; font-size:13px; ">Location To Deliver</th>
                                            <th style="width: 225px; font-size:13px; text-align:center;">Action</th>
                                            
                                            </tr>
                                        </thead>   
                                        <?php
                                            //Query
                                            $sql = "SELECT * FROM request_supply WHERE `status`='Approved' && jobStatus = 'Pending'";
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
                                                    $status             = $row["status"];
                                                    $requestName        = $row["requestName"];
                                                    $requestPhone       = $row["requestPhone"];
                                                    $location           = $row["location"];
                                        ?>                    
                                        <tbody>
                                        <tr>
                                        <input type="hidden" value="<?=$id?>" name="id">
                                            <td style="width: 20px; font-size:13px; text-align:center;"><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold"><?=$id?></a> </td>
                                            <td style="width: 170px; font-size:13px; "><?=$requestName?></td>
                                            <td style="width: 170px; font-size:13px; "><?=$supplyDesc?></td>
                                            <td style="width: 170px; font-size:13px; text-align:center;"><?=$quarantineDuration?></td>
                                            <td style="width: 170px; font-size:13px; text-align:center;"><?=$numPeople?></td>
                                            <td style="width: 170px; font-size:13px; text-align:center;"><?=$requestPhone?></td>
                                            <td style="width: 170px; font-size:13px; "><?=$location?></td>
                                            <td style="text-align:center;">
                                                <a href="viewLocation.php?id=<?= $id ?>" class="btn btn-info btn-sm"><i class="mdi mdi-calendar-multiple-check mdi-18px" style="color: white; icon-large"></i> View Location</a>
                                            </td>
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

            <!-- end row-->
        </div>

    </body>
</html>