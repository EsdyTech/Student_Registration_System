<?php

 include('includes/dbconnection.php');
 include('includes/session.php');

$que = mysqli_query($con,"select * from tblprogramme where regNo = '$regNo'");
$rrr = mysqli_fetch_array($que);
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
                        <h3>Welcome: <?php echo $rows['firstName'].' '.$rows['lastName'];?></h3>
                    </div>
                </div>
            </div>
        </div>  
    </div> 
	<!-- bradcam_area_end -->


	
	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			<div class="section-top-border">
				<div class="row">
					<div class="col-md-3">
						<img src="passports/<?php echo $rrr['passport'];?>" style="width:200px;height:150px" alt="" class="img-fluid">
					</div>
					<div class="col-md-9 mt-sm-20">
                        <h2 style="margin-left:100px;"><?php echo strToUpper($rows['firstName'].' '.$rows['lastName'].' '.$rows['otherName']);?></h2>  
                        <h3 style="margin-left:100px;"> Registration No: <?php echo strToUpper($rows['regNo']);?></h3>  
                        <h4 style="margin-left:100px;">Your Registration is Complete, Kindly click the button below to print Registration Form!</h>   
                         <div class="button-group-area mt-40">
                                <a style="margin-left:150px;" href="registrationComplete.php" class="genric-btn success circle">View Registration Form</a>
                            </div>
					</div>
				</div>
			</div>
		
			
					</div>
				</div>
			</div>
		</div>
    </div>			


    
        
    
			<!-- <div class="section-top-border">
				<h3 class="mb-30">Table</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">#</div>
							<div class="country">Countries</div>
							<div class="visit">Visits</div>
							<div class="percentage">Percentages</div>
						</div>
						<div class="table-row">
							<div class="serial">01</div>
							<div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
							<div class="visit">645032</div>
							<div class="percentage">
								<div class="progress">
									<div class="progress-bar color-1" role="progressbar" style="width: 80%"
										aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		
			
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