<?php

session_start();
 include('includes/dbconnection.php');
    error_reporting(0);

if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

        $regNo=$_POST['regNo'];
        $lastName=$_POST['lastName'];

        $query = mysqli_query($con,"select * from tblinitialreg where lastName='$lastName' and regNo = '$regNo'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0)
    {
            $_SESSION['Id']=$row['Id'];
            $_SESSION['regNo']=$row['regNo'];

            echo "<script type = \"text/javascript\">
            window.location = (\"personalData.php\");
            </script>";
    }
    else{

        $alertStyle ="genric-btn danger";
        $statusMsg="Invalid Credentials!";
    }


  }

  ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
       <?php include "includes/head.php";?>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php include "includes/header1.php";?>
    <!-- header-end -->


    <!-- latest_coures_area_start  -->
    <div data-scroll-index='1' class="admission_area">
        <div class="admission_inner">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="admission_form">
                            <h3 style="font-size:20px;">Enter Your Lastname and the Registration Number sent to your email address to continue your Registration!</h3>
                             <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                             <br> <br>
                            <form action="" method="post">
                                <div class="row">
                                  <div class="col-md-12">
                                        <div class="single_input">
                                            <input type="text" required name="lastName" required placeholder="LastName" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_input">
                                            <input type="text" required name="regNo" required placeholder="Registration Number" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="apply_btn">
                                            <button class="boxed-btn3" name="submit" type="submit">Continue Registration</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_coures_area_end -->


   
    <!-- footer start -->
   <?php include 'includes/footer.php';?>
    <!-- footer end  -->


    <!-- JS here -->
       <?php include 'includes/scripts.php';?>
</body>

</html>