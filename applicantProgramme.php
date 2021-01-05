<?php
 include('includes/dbconnection.php');
 include('includes/session.php');


    $que = mysqli_query($con,"select * from tblprogramme where regNo = '$regNo'");
    $rrr = mysqli_fetch_array($que);

    $programmeTypeId = $rrr['programmeTypeId'];
    $programmeModeId = $rrr['programmeModeId'];
    $facultyId = $rrr['facultyId'];
    $departmentId = $rrr['departmentId'];
    $passport = $rrr['passport'];

    $queFac = mysqli_query($con,"select * from tblfaculty where Id = '$facultyId'");
    $rFac= mysqli_fetch_array($queFac);

    $queDept = mysqli_query($con,"select * from tbldepartment where Id = '$departmentId'");
    $rDept = mysqli_fetch_array($queDept);

    $queMode = mysqli_query($con,"select * from tblprogrammemode where Id = '$programmeModeId'");
    $rMode = mysqli_fetch_array($queMode);

    $queTyp = mysqli_query($con,"select * from tblprogrammetype where Id = '$programmeTypeId'");
    $rType = mysqli_fetch_array($queTyp);



    $queFee = mysqli_query($con,"select * from tblprogrammefees where programmeTypeId = '$programmeTypeId' and programmeModeId='$programmeModeId'");
    $rrrFee = mysqli_fetch_array($queFee);


    $alertStyle ="";
    $statusMsg="";

if(isset($_POST['submit'])){

    

    $programmeTypeId=$_POST['programmeTypeId'];
    $programmeModeId=$_POST['programmeModeId'];
    $facultyId=$_POST['facultyId'];
    $departmentId=$_POST['departmentId'];
       $dateCreated = date("Y-m-d");
    //get the session
    $queryys = mysqli_query($con,"select * from tblsession where isActive = '1'");
    $count = mysqli_num_rows($queryys);
    $row = mysqli_fetch_array($queryys);
    $sessionId = $row['Id'];


    $fileTmpPath = $_FILES['passport']['tmp_name'];
    $fileName = $_FILES['passport']['name'];
    $fileSize = $_FILES['passport']['size'];
    $fileType = $_FILES['passport']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    //gives the fileupoladed a unique Identifier
    $newFileName = md5(time().$fileName).'.'.$fileExtension;

    $allowedfileExtensions = array('jpg', 'png','jpeg');
    if (!in_array($fileExtension, $allowedfileExtensions)) {

        echo "<script type = \"text/javascript\">
        alert(\"The File type is not allowed!\");
        </script>";
    }
    else{

        $uploadFileDir = 'passports/';
        $dest_path = $uploadFileDir . $newFileName;
        move_uploaded_file($fileTmpPath, $dest_path);
        
        $query = mysqli_query($con,"select * from tblprogramme where regNo = '$regNo'");
        $count = mysqli_num_rows($query);

        if($count > 0)
        {
            $ret=mysqli_query($con,"update tblprogramme set regNo='$regNo',programmeTypeId='$programmeTypeId',programmeModeId='$programmeModeId',facultyId='$facultyId',departmentId='$departmentId',
            sessionId='$sessionId',passport='$newFileName' where regNo='$regNo'");
            if ($ret) {

            echo "<script type = \"text/javascript\">
            window.location = (\"applicantProgramme.php\")
            </script>";
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
        }
        else{

                $queryy=mysqli_query($con,"insert into tblprogramme(regNo,programmeTypeId,programmeModeId,facultyId,departmentId,sessionId,passport,dateCreated) 
                value('$regNo','$programmeTypeId','$programmeModeId','$facultyId','$departmentId','$sessionId','$newFileName','$dateCreated')");
            if ($queryy) {

                echo "<script type = \"text/javascript\">
                window.location = (\"applicantProgramme.php\")
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

<script>
   
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, true);
    function payWithPaystack() {
        var handler = PaystackPop.setup({
            key: 'pk_test_74c53a49cf86f2b421b52ae3b7e5bf15cd106dd0', // Replace with your public key
            email: document.getElementById('email-address').value,
            amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
            firstname: document.getElementById('first-name').value,
            lastname: document.getElementById('last-name').value,
            reference: 'YOUR_REFERENCE', // Replace with a reference you generated
            callback: function (response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;
                document.getElementById('reference').value = reference;

                var regNo = document.getElementById('reg-no').value;
                var theamount = document.getElementById('amount').value;

                // alert('Payment Successful and complete! Reference: ' + reference);
                alert('Payment Successful and complete!');
                window.location.href = 'paymentComplete.php?&reference='+ reference +'&amount='+ theamount +'&regNo='+ regNo +'';
                // Make an AJAX call to your server with the reference to verify the transaction
            },
            onClose: function () {

                alert('Transaction was not completed.');
                 //window.location.href = '/customer/checkout';
            },
        });
        handler.openIframe();
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
                        <h3 class="mb-30">Programme</h3>
                         <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                        <form action="" method="post" enctype="multipart/form-data">
                         <div class="form-group row mb-3">
                            <div class="col-xl-12 mb-3">
                            <?php 
                                    $query=mysqli_query($con,"select * from tblfaculty ORDER BY facultyName ASC");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo ' <select required class="form-select" name="facultyId" onchange="showValues(this.value)">';
                                        echo'<option value="">--Select Faculty--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['Id'].'" >'.$row['facultyName'].'</option>';
                                            }
                                                echo '</select>';
                                            }
                                    ?>  
                            </div>
                                <div class="col-xl-12">
                                 <?php
                                        echo"<div id='txtHint'></div>";
                                    ?>   
                            </div>
                            </div>

                            <div class="form-group row">
                            <div class="col-xl-12 mb-3">
                             <?php 
                                    $query=mysqli_query($con,"select * from tblprogrammetype");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo ' <select required class="form-select" name="programmeTypeId">';
                                        echo'<option value="">--Select Programme Type--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['Id'].'" >'.$row['typeName'].'</option>';
                                            }
                                                echo '</select>';
                                            }
                                    ?>     
                            </div>
                                <div class="col-xl-12">
                                  <?php 
                                    $query=mysqli_query($con,"select * from tblprogrammemode");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo ' <select required class="form-select" name="programmeModeId">';
                                        echo'<option value="">--Select Programme Mode--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['Id'].'" >'.$row['modeName'].'</option>';
                                            }
                                                echo '</select>';
                                            }
                                    ?>     
                            </div>
                            </div>
                           
                              <i style="font-size:12px;">Passport photograph upload must not exceed 1mb</i>
                             <div class="input-group-icon mt-10">
                                <div class="icon"><i class="" aria-hidden="true"></i></div>
                                <input type="file" name="passport" placeholder="Passport" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Passport'" required class="form-control">
                            </div>
                            <br>
                            <i style="font-size:15px;">Total Amount of Selected Programme and Programme Type:</i> <i style="font-size:15px;color:red;">&#8358;<?php echo number_format($rrrFee['amount']);?></i>

                             <br>
                            <div class="button-group-area mt-40">
                                <a href="nextOfKinDetails.php" class="genric-btn success circle"><< Back</a>
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                            </div>
                        </form>
                        <br>

                    <form id="paymentForm">
                    <input type="hidden" id="email-address" value="<?php echo $rows['emailAddress'];?>" required />
                    <input type="hidden" id="amount" value="<?php echo $rrrFee['amount'];?>" required />
                    <input type="hidden" id="first-name" value="<?php echo $rows['firstName'];?>" />
                    <input type="hidden" id="last-name" value="<?php echo $rows['lastName'];?>" />
                    <input type="hidden" id="reg-no" name="reg-no" value="<?php echo $_SESSION['regNo'];?>" />
                    <input type="hidden" id="reference" name="reference" />
                   
                <button type="button" class="genric-btn success circle" onclick="payWithPaystack()">Continue To Payment >></button>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                    </form>


                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                            <h3 class="mb-30">Programme Details Preview</h3>
                            <p><b>Passport:</b></p>
                            <?php if($passport != ''){?>
                            <img src="passports/<?php echo $passport;?>" alt="" class="img-fluid">
                            <br><br>
                            <?php }else {?>
                            <?php }?>
                             <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Reg No:</b> <?php echo $regNo;?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Faculty:</b> <?php echo $rFac['facultyName'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Department:</b> <?php echo $rDept['departmentName'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Programme Type:</b><?php echo $rType['typeName'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Programme Mode:</b><?php echo $rMode['modeName'];?></p>
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