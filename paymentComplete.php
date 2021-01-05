<?php
 include('includes/dbconnection.php');
 include('includes/session.php');

if (isset($_GET['reference']) && isset($_GET['amount']) &&isset($_GET['regNo']))
	{
        $reference= $_GET['reference'];
        $amount= $_GET['amount'];
        $regNo= $_GET['regNo'];
        $dateCreated = date("Y-m-d");


        $qqrryy = mysqli_query($con,"select * from tblpayments where regNo ='$_SESSION[regNo]'");
        $count = mysqli_num_rows($qqrryy);

    if($count > 0)
    {
        $rre=mysqli_query($con,"update tblpayments set regNo='$regNo',transactionId='$reference',amount='$amount' where regNo='$regNo'");
        if ($rre) {

            //Update isRegComplete to 1
             $rres=mysqli_query($con,"update tblinitialreg set isRegComplete='1' where regNo='$regNo'");
             
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
    }
    else
    {

        $queryys2=mysqli_query($con,"insert into tblpayments(regNo,transactionId,amount,dateCreated) 
        value('$regNo','$reference','$amount','$dateCreated')");

        if ($queryys2) {

            $qry = mysqli_query($con,"select * from tblpayments where regNo ='$regNo'");
            $qryCount = mysqli_num_rows($qry);
            $rws = mysqli_fetch_array($qry);

            if($qryCount > 0){

                $reference= $rws['transactionId'];
                $amount= $rws['amount'];
                $regNo= $rws['regNo'];

                //Update isRegComplete to 1
             $rres=mysqli_query($con,"update tblinitialreg set isRegComplete='1' where regNo='$regNo'");


            }
            else
            {
                echo "<script type = \"text/javascript\">
                window.location = (\"applicantProgramme.php\")
                </script>";
            }
        }
        else
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"applicantProgramme.php\")
            </script>";
        }

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
			
			<div class="section-top-border">
				<h3 class="mb-30">Payment Details</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="country">Registration Number</div>
							<div class="visit">Reference Number</div>
							<div class="percentage">Amount Paid</div>
						</div>
						<div class="table-row">
							<div class="country"><?php if(isset($regNo)){echo $regNo; }?></div>
							<div class="visit"><?php if(isset($reference)){echo $reference; }?></div>
							<div class="percentage">&#8358;<?php if(isset($amount)){echo number_format($amount); }?></div>
						</div>
					</div>
				</div>
			</div>
			 <div class="button-group-area mt-40">
            <a href="registrationComplete.php" class="genric-btn success circle">Click to View and Print Registration Form</a>
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