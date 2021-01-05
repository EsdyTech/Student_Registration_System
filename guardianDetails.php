<?php
 include('includes/dbconnection.php');
 include('includes/session.php');

 //echo $_SESSION['regNo'];

    $quersy = mysqli_query($con,"select * from tblguardian where regNo ='$_SESSION[regNo]'");
    $rowss = mysqli_fetch_array($quersy);

if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

  $guardianName=$_POST['guardianName'];
  $guardianAddress=$_POST['guardianAddress'];
  $guardianPhoneNo=$_POST['guardianPhoneNo'];
 
        $query = mysqli_query($con,"select * from tblguardian where regNo ='$_SESSION[regNo]'");
        $count = mysqli_num_rows($query);

    if($count > 0)
    {
        $rre=mysqli_query($con,"update tblguardian set regNo='$regNo',guardianName='$guardianName',guardianAddress='$guardianAddress',guardianPhoneNo='$guardianPhoneNo' where regNo='$regNo'");
        if ($rre) {

            echo "<script type = \"text/javascript\">
            window.location = (\"guardianDetails.php\");
            </script>";
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
    }
    else{

         $queryy=mysqli_query($con,"insert into tblguardian(regNo,guardianName,guardianAddress,guardianPhoneNo) value('$regNo','$guardianName','$guardianAddress','$guardianPhoneNo')");
        if ($queryy) {

            echo "<script type = \"text/javascript\">
            window.location = (\"guardianDetails.php\");
            </script>";
        }
        else
            {
                $alertStyle ="genric-btn danger";
                $statusMsg="An error Occurred!";
            }
    }

  }

?>




<!doctype html>
<html class="no-js" lang="zxx">

<head>
           <?php include "includes/head.php";?>
           <!-- Scripts for Country and Regions Dropdown Addedd-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="js/geodatasource-cr.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/geodatasource-countryflag.css"> -->
    <!-- link to languages po files -->
    <link rel="gettext" type="application/x-po" href="languages/en/LC_MESSAGES/en.po" />
    <script type="text/javascript" src="../js/Gettext.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
          <?php include "includes/header1.php";?>

    <!-- header-end -->

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?php echo $rows['firstName'].' '.$rows['lastName'];?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
   
    <!-- Start Align Area -->
    <div class="whole-wrap">
        <div class="container box_1170">
             <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30">Guardian Details</h3>
                        <form action="" method="post">
                           
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" name="guardianName" value="<?php echo $rowss['guardianName'];?>" placeholder="guardian Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Guardiabn Name'" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="guardianAddress" value="<?php echo $rowss['guardianAddress'];?>" placeholder="guardian Address" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'guardian Address'" required class="single-input">                                </div>
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="guardianPhoneNo" value="<?php echo $rowss['guardianPhoneNo'];?>" placeholder="guardian Phone" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'guardian Phone'" required class="single-input">                                </div>
                            </div>
                           <div class="button-group-area mt-40">
                                <a href="documentUploads.php" class="genric-btn success circle"><< Back</a>
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                                <a href="nextOfKinDetails.php" class="genric-btn success circle">Continue >></a>
                            </div>
                           
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                        <h3 class="mb-30">Guardian Details Preview</h3>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Guardian Name:</b> <?php echo $rowss['guardianName'];?>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Guardian Address:</b> <?php echo $rowss['guardianAddress'];?>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Guardian PhoneNumber:</b> <?php echo $rowss['guardianPhoneNo'];?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Align Area -->

    <!-- footer start -->
          <?php include "includes/footer.php";?>
    <!-- footer end  -->

    <!-- JS here -->
             <?php include "includes/scripts.php";?>

   
</body>

</html>