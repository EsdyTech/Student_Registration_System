<?php
 include('includes/dbconnection.php');
 include('includes/session.php');


    $quersy = mysqli_query($con,"select * from tblpersonaldata where regNo ='$_SESSION[regNo]'");
    $rowss = mysqli_fetch_array($quersy);

if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

  $firstName=$_POST['firstName'];
  $surName=$_POST['surName'];
  $middleName=$_POST['middleName'];
  $sex=$_POST['sex'];
  $phoneNo=$_POST['phoneNo'];
  $regNo =$_POST['regNo'];
   $dob =$_POST['dob'];
    $address =$_POST['address'];
     $nationality =$_POST['nationality'];
      $state =$_POST['state'];
    $lga =$_POST['lga'];
   $dateCreated = date("Y-m-d");    

        $query = mysqli_query($con,"select * from tblpersonaldata where regNo ='$_SESSION[regNo]'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0)
    {
        $ret=mysqli_query($con,"update tblpersonaldata set regNo='$regNo',surName='$surName',firstName='$firstName',middleName='$middleName',sex='$sex',
        phoneNo='$phoneNo',dob='$dob',address='$address',nationality='$nationality',state='$state',lga='$lga' where regNo='$regNo'");
        if ($ret) {

            echo "<script type = \"text/javascript\">
            window.location = (\"personalData.php\");
            </script>";
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
    }
    else{

         $queryy=mysqli_query($con,"insert into tblpersonaldata(regNo,surName,firstName,middleName,sex,phoneNo,dob,address,nationality,state,lga,dateCreated) value('$regNo','$surName','$firstName','$middleName','$sex','$phoneNo','$dob','$address','$nationality','$state','$lga','$dateCreated')");
        if ($queryy) {

            echo "<script type = \"text/javascript\">
            window.location = (\"personalData.php\");
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
                        <h3 class="mb-30">Personal Data</h3>
                        <form action="#" method="post">
                            <div class="input-group-icon mt-10">
                                 <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                <input type="text" name="dob" placeholder="Date of Birth (11/01/2020)" value="<?php echo $rowss['dob'];?>"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date of Birth'" required
                                    class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="address" value="<?php echo $rowss['address'];?>" placeholder="Address" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Address'" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="nationality" value="<?php echo $rowss['nationality'];?>" placeholder="Nationality" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Nationality'" required class="single-input">                                </div>
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="state" value="<?php echo $rowss['state'];?>" placeholder="State" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'State'" required class="single-input">                                </div>
                            </div>

                             <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                <input type="text" name="lga" value="<?php echo $rowss['lga'];?>" placeholder="LGA of State" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'LGA of State'" required class="single-input">
                            </div>
                            <div class="button-group-area mt-40">
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                                <a href="educationDetails.php" class="genric-btn success circle">Continue >></a>
                            </div>
                             <input type="hidden" name="regNo" value="<?php echo $rows['regNo']; ?>">
                              <input type="hidden" name="surName" value="<?php echo $rows['lastName']; ?>">
                               <input type="hidden" name="firstName" value="<?php echo $rows['firstName']; ?>">
                                <input type="hidden" name="middleName" value="<?php echo $rows['otherName']; ?>">
                                 <input type="hidden" name="sex" value="<?php echo $rows['sex']; ?>">
                                  <input type="hidden" name="phoneNo" value="<?php echo $rows['phoneNo']; ?>">
                         
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                            <h3 class="mb-30">Personal Data Preview</h3>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Surname: <?php echo $rows['lastName'];?></p>&nbsp;<p>Date of Birth: <?php echo $rowss['dob'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Firstname: <?php echo $rows['firstName'];?></p>&nbsp;<p>Address: <?php echo $rowss['address'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Othername: <?php echo $rows['otherName'];?></p>&nbsp;<p>Nationality: <?php echo $rowss['nationality'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Reg No: <?php echo $rows['regNo'];?></p>&nbsp;<p>State: <?php echo $rowss['state'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Gender: <?php echo $rows['sex'];?></p>&nbsp;<p>LGA: <?php echo $rowss['lga'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Phone Number: <?php echo $rows['phoneNo'];?></p>
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