
<?php
session_start();
 include('includes/dbconnection.php');
    error_reporting(0);
require_once ('php-mailer/PHPMailerAutoload.php');

if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $otherName=$_POST['otherName'];
  $emailAddress=$_POST['emailAddress'];
  $sex=$_POST['sex'];
  $phoneNo=$_POST['phoneNo'];
  $dateCreated = date("Y-m-d");

        $query = mysqli_query($con,"select * from tblsession where  isActive = '1'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0)
    {

        $query2 = mysqli_query($con,"select * from tblinitialreg");
        $count2 = mysqli_num_rows($query2);

        $regCount = "";
            if($count2 == 0){
                $regCount = 1;
            }
            else{
                $regCount  =  $count2 + 1;
            }

            //Registration Number ge
            $regNo = "LNDPOLY/".$row['sessionName']."/00000".$regCount;

            //Code to Send a mail
            
            //The Subject and the body of the Mail
            $subject = "LandMark Polytechnic Registration";
            $body = "Use your surname and this registration number ".$regNo." to continue your registration process!";
            $body .= "Thanks!";

            //The Email Configuraton Class
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure='ssl';
            $mail->Host='smtp.googlemail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username ='sawdykdevtest@gmail.com';
            $mail->Password ='sawdykdevtest2020';
            $mail->SetFrom('no-reply@howcode.org');
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($emailAddress); //delivery email Address
            
            //Handles Success or Failure Response
            if(!$mail->Send()) 
            {
                $alertStyle ="genric-btn danger";
                $statusMsg="An error Occurred!";
            // $msg = " An Error Ocuured while trying to send Mail, Kindly Contact Administrator. Thanks!";
            } 
            else 
            {

                $queryy=mysqli_query($con,"insert into tblinitialreg(firstName,lastName,otherName,sex,emailAddress,phoneNo,regNo,isRegComplete,dateCreated) 
                value('$firstName','$lastName','$otherName','$sex','$emailAddress','$phoneNo','$regNo','0','$dateCreated')");
                if ($queryy) {

                    echo "<script type = \"text/javascript\">
                    window.location = (\"initialRegSuccess1.php\");
                    </script>";
              
                }
                else
                {
                    $alertStyle ="genric-btn danger";
                    $statusMsg="An error Occurred!";
                }
                
            }
    }
    else{

        $alertStyle ="genric-btn danger";
        $statusMsg="An error Occurred!";
    }


  }


  //-------------------------------------Login to Print Registration Form -------------------------------

  if(isset($_POST['submit2'])){

     $alertStyle2 ="";
     $statusMsg2="";

        $regNo=$_POST['regNo'];
        $lastName=$_POST['lastName'];

        $query = mysqli_query($con,"select * from tblinitialreg where lastName='$lastName' and regNo = '$regNo'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0 && $row['isRegComplete'] == '1') //if credentials are valid and the registraton is complete
    {
            $_SESSION['Id']=$row['Id'];
            $_SESSION['regNo']=$row['regNo'];

            echo "<script type = \"text/javascript\">
            window.location = (\"studentDashboard.php\");
            </script>";
    }
    else if($count > 0 && $row['isRegComplete'] == '0'){ //if credentials are valid and the registraton is incomplete

            $_SESSION['Id']=$row['Id'];
            $_SESSION['regNo']=$row['regNo'];

            echo "<script type = \"text/javascript\">
            window.location = (\"personalData.php\");
            </script>";
    }
    else{ //else if credentials are invalid

        $alertStyle2 ="genric-btn danger";
        $statusMsg2="Invalid Credentials!";
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
    <?php include "includes/header.php";?>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                            <h3>NURTURING GODLY AMBASSADOR.</h3>
                                <!-- <a href="#" class="boxed-btn3">Get Start</a>
                                <a href="#" class="boxed-btn4">Take a tour</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                            <h3>NURTURING GODLY AMBASSADOR.</h3>
                                <!-- <a href="#" class="boxed-btn3">Get Start</a>
                                <a href="#" class="boxed-btn4">Take a tour</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                            <h3>NURTURING GODLY AMBASSADOR.</h3>
                                <!-- <a href="#" class="boxed-btn3">Get Start</a>
                                <a href="#" class="boxed-btn4">Take a tour</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- latest_coures_area_start  -->
    <div data-scroll-index='1' class="admission_area">
        <div class="admission_inner">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="admission_form">
                            <h3>Apply for Admission</h3>
				        <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="firstName" required placeholder="First Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="lastName" required placeholder="Last Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="otherName" required placeholder="Other Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <div class="form-select" id="default-select">
									<select name="sex">
                                        <option value="">--Select--</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									</select>
								</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" name="phoneNo" required placeholder="Phone Number" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="email" name="emailAddress" required placeholder="Email Address" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="apply_btn">
                                            <button class="boxed-btn3" name="submit" type="submit">Apply</button>
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
<br><br><br><br>


     <!-- latest_coures_area_start  -->
    <div data-scroll-index='2' class="admission_area">
        <div class="admission_inner">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="admission_form">
                            <h3>Login</h3>
				       <a href="#" class="<?php echo $alertStyle2;?>"><?php echo $statusMsg2;?></a>
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
                                            <button class="boxed-btn3" name="submit2" type="submit">Login</button>
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



    <!-- recent_news_area_start  -->
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Recent News</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="#">
                                <img src="img/admission/landmark1.jpg" alt="">
                            </a>
                            <span class="badge">School Gate</span>
                        </div>
                        <div class="news_info">
                            <a href="#">
                                <h4>Welcome to LandMark Polytechnic,Ayetoro/Itele via Ayobo, Ogun State</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="#">
                                <img src="img/admission/land4.jpg" alt="">
                            </a>
                            <span class="badge bandge_2">Admission</span>
                        </div>
                        <div class="news_info">
                            <a href="#">
                                <h4>2019/2020 Admission in Progress at LandMark Polytechnic,Ayetoro/Itele via Ayobo, Ogun State</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent_news_area_end  -->

    <!-- footer start -->
   <?php include 'includes/footer.php';?>
    <!-- footer end  -->


    <!-- JS here -->
       <?php include 'includes/scripts.php';?>
</body>

</html>