<?php
 include('includes/dbconnection.php');
 include('includes/session.php');

    $alertStyle ="";
    $statusMsg="";







if(isset($_POST['submit'])){

     $instituteName=$_POST['instituteName'];
        $N = count($instituteName);

    $instituteName=$_POST['instituteName'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $qualification=$_POST['qualification'];

   

        $query = mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0)
    {

        for($i = 0; $i < $N; $i++)
        {
            $instituteName[$i];
            $from[$i];
            $to[$i];
            $qualification[$i];

            $ret1=mysqli_query($con,"update tbleducation set regNo='$regNo',instituteName='$instituteName[$i]',fromDate='$from[$i]',
            toDate='$to[$i]',qualification='$qualification[$i]' where regNo='$regNo'");

            if ($ret1) {

                echo "<script type = \"text/javascript\">
                window.location = (\"educationDetails.php\");
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

        for($i = 0; $i < $N; $i++)
        {
            $instituteName[$i];
            $from[$i];
            $to[$i];
            $qualification[$i];

            $queryy=mysqli_query($con,"insert into tbleducation(regNo,instituteName,fromDate,toDate,qualification) 
            value('$regNo','$instituteName[$i]','$from[$i]','$to[$i]','$qualification[$i]')");

           if ($queryy) {

            echo "<script type = \"text/javascript\">
            window.location = (\"educationDetails.php\");
            </script>";
            }
            else
                {
                    $alertStyle ="genric-btn danger";
                    $statusMsg="An error Occurred!";
                }

        }
      
    }

  }

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
           <?php include "includes/head.php";?>
    <script>
        function showValues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCalldept.php?fid="+str,true);
        xmlhttp.send();
    }
}

        </script>
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
                        <h3 class="mb-30">Education</h3>
                         <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                       <form action="#" method="post">

                       <?php
                       for($i = 1; $i <= 4; $i++){

                        //    $quersy= mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
                        //      while ($rowss = mysqli_fetch_array($quersy)) {
                       ?>
                            <h3 class="mb-30"><?php echo $i;?></h3>
                            <div class="input-group-icon mt-10">
                                 <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <input type="text" name="instituteName[]" placeholder="Institute" 
                                    onfocus="this.placeholder = 'Institute'" onblur="this.placeholder = 'Institute'" required
                                    class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                <input type="text" name="from[]"  placeholder="From Date" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'From'" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="to[]" placeholder="To Date" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'To'" required class="single-input">                                
                                </div>
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="qualification[]" placeholder="Qualification" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Qualification'" required class="single-input">                                
                                </div>
                            </div>

                       <?php   }?>
                       
                                
                             <div class="button-group-area mt-40">
                                <a href="personalData.php" class="genric-btn success circle"><< Back</a>
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                                <a href="resultDetails.php" class="genric-btn success circle">Continue >></a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                            <h3 class="mb-30">Education Details Preview</h3>
                             <?php 
                            $quersy = mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
                            $count = mysqli_num_rows($query);
                                $cnt=0;
                            if($count > 0){                       
                                while ($row = mysqli_fetch_array($quersy)) {
                                $cnt = $cnt+1;
                                echo' <div class="switch-wrap d-flex justify-content-between">
                                <p>Institute Name: '.$row['instituteName'].'</p>&nbsp;<p>From Date: '.$row['fromDate'].'</p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>To Date: '.$row['toDate'].'</p>&nbsp;<p>Qualification: '.$row['qualification'].'</p>
                            </div>';
                             echo $cnt;
                            echo'----------------------------------------------------------------------------------';
                            }
                                 }
                            ?>    
                           
                            
                           
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