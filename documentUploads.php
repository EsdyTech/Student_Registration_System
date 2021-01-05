<?php
 include('includes/dbconnection.php');
 include('includes/session.php');


  $que = mysqli_query($con,"select * from tbldocuments where regNo = '$regNo'");
    $rrr = mysqli_fetch_array($que);

    $alertStyle ="";
    $statusMsg="";

if(isset($_POST['submit'])){

//--------------State of Origin-----------------------------

    $originfileTmpPath = $_FILES['originFile']['tmp_name'];
    $originfileName = $_FILES['originFile']['name'];
    $originfileSize = $_FILES['originFile']['size'];
    $originfileType = $_FILES['originFile']['type'];
    $originfileNameCmps = explode(".", $originfileName);
    $originfileExtension = strtolower(end($originfileNameCmps));

    //gives the fileupoladed a unique Identifier
    $originnewFileName = md5(time().$originfileName).'.'.$originfileExtension;


    //------------------------Birth Certificate---------------------------
    $birthfileTmpPath = $_FILES['birthFile']['tmp_name'];
    $birthfileName = $_FILES['birthFile']['name'];
    $birthfileSize = $_FILES['birthFile']['size'];
    $birthfileType = $_FILES['birthFile']['type'];
    $birthfileNameCmps = explode(".", $birthfileName);
    $birthfileExtension = strtolower(end($birthfileNameCmps));

    //gives the fileupoladed a unique Identifier
    $birthnewFileName = md5(time().$birthfileName).'.'.$birthfileExtension;


    $allowedfileExtensions = array('jpg', 'png','jpeg');
    if (!in_array($originfileExtension, $allowedfileExtensions)) {

        echo "<script type = \"text/javascript\">
        alert(\"The File type is not allowed!\");
        </script>";
    }
     else if (!in_array($birthfileExtension, $allowedfileExtensions)) {

        echo "<script type = \"text/javascript\">
        alert(\"The File type is not allowed!\");
        </script>";
    }
   
    else{

        //--------------State of Origin-----------------------------

        $uploadFileDir = 'documents/';
        $dest_path = $uploadFileDir . $originnewFileName;
        move_uploaded_file($originfileTmpPath, $dest_path);

        //------------------------Birth Certificate---------------------------
        $uploadFileDir = 'documents/';
        $dest_path = $uploadFileDir . $birthnewFileName;
        move_uploaded_file($birthfileTmpPath, $dest_path);


        $query = mysqli_query($con,"select * from tbldocuments where regNo = '$regNo'");
        $count = mysqli_num_rows($query);

        if($count > 0)
        {
            $ret=mysqli_query($con,"update tbldocuments set regNo='$regNo',originCert='$originnewFileName',birthCert='$birthnewFileName' where regNo='$regNo'");
            if ($ret) {

            echo "<script type = \"text/javascript\">
            window.location = (\"documentUploads.php\")
            </script>";
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
        }
        else{

                $queryy=mysqli_query($con,"insert into tbldocuments(regNo,originCert,birthCert) 
                value('$regNo','$originnewFileName','$birthnewFileName')");
            if ($queryy) {

                echo "<script type = \"text/javascript\">
                window.location = (\"documentUploads.php\")
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
                        <h3 class="mb-30">Document Upload</h3>
                        <i style="font-size:12px;color:red;">Upload must be in jpg, jpeg or png format</i>
                         <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                        <form action="" method="post" enctype="multipart/form-data">

                             <i style="font-size:12px;">State of Origin Certificate</i>
                             <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-file" aria-hidden="true"></i></div>
                                <input type="file" name="originFile" placeholder="" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ''" required class="single-input">
                            </div>
                            <i style="font-size:12px;">Birth Certificate</i>
                             <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-file" aria-hidden="true"></i></div>
                                <input type="file" name="birthFile" placeholder="" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ''" required class="single-input">
                            </div>
                            <div class="button-group-area mt-40">
                                <a href="resultDetails.php" class="genric-btn success circle"><< Back</a>
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                                <a href="guardianDetails.php" class="genric-btn success circle">Continue >></a>
                            </div>
                            
                         
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                            <h3 class="mb-30">Document Status</h3>
                             <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Birth Certificate:</b>&nbsp;&nbsp;&nbsp;<?php if($rrr['birthCert'] != ''){echo 'Uploaded';}else{echo 'Not Uploaded';}?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>State of Origin Certificate:</b>&nbsp;&nbsp;&nbsp;<?php if($rrr['originCert'] != ''){echo 'Uploaded';}else{echo 'Not Uploaded';}?></p>
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