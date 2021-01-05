<?php
 include('includes/dbconnection.php');
 include('includes/session.php');

    $alertStyle ="";
    $statusMsg="";

//-----------------------FIRST SITTING------------------------------------------------

if(isset($_POST['submit'])){

//------------FIRST--------------------------------

     $subject1=$_POST['subject1'];
    $grade1=$_POST['grade1'];
    $N1 = count($subject1);

    $candidateExamName1=$_POST['candidateExamName1'];
    $examType1=$_POST['examType1'];
    $examNo1=$_POST['examNo1'];
    $examDate1=$_POST['examDate1'];

//------------SECOND--------------------------------

     $subject2=$_POST['subject2'];
    $grade2=$_POST['grade2'];
    $N2 = count($subject2);

    $candidateExamName2=$_POST['candidateExamName2'];
    $examType2=$_POST['examType2'];
    $examNo2=$_POST['examNo2'];
    $examDate2=$_POST['examDate2'];




        $query = mysqli_query($con,"select * from tblresult where regNo ='$_SESSION[regNo]'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0)
    {

        //------------FIRST--------------------------------

         $rett1=mysqli_query($con,"update tblresult set regNo='$regNo',candidateExamName='$candidateExamName1',examNo='$examType1',
         examDate='$examDate1',examType='$examType1',sitting='First' where regNo='$regNo' and sitting='First'");

         //------------SECOND--------------------------------
        $rett2=mysqli_query($con,"update tblresult set regNo='$regNo',candidateExamName='$candidateExamName2',examNo='$examType2',
         examDate='$examDate2',examType='$examType2',sitting='Second' where regNo='$regNo' and sitting='Second'");

        if($rett1 && $rett2){

 //-------------------------FIRST--------------------------
            for($i = 0; $i < $N1; $i++)
            {
                $subject1[$i];
                $grade1[$i];
            
                $ret1=mysqli_query($con,"update tblresultdetails set regNo='$regNo',subject='$subject1[$i]',grade='$grade1[$i]',sitting='First' where regNo='$regNo' and sitting='First'");

                if ($ret1) {

                    echo "<script type = \"text/javascript\">
                    window.location = (\"resultDetails.php\");
                    </script>";
                }
                else
                {
                    $alertStyle ="genric-btn danger";
                    $statusMsg="An error Occurred!";
                }
            }
//---------------------SECOND----------------------------------

            for($i = 0; $i < $N2; $i++)
            {
                $subject2[$i];
                $grade2[$i];
            
                $ret2=mysqli_query($con,"update tblresultdetails set regNo='$regNo',subject='$subject2[$i]',grade='$grade2[$i]',sitting='Second' where regNo='$regNo' and sitting='Second'");

                if ($ret2) {

                    echo "<script type = \"text/javascript\">
                    window.location = (\"resultDetails.php\");
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
    else{

        //----------------------FIRST------------------------------------
             $queryys1=mysqli_query($con,"insert into tblresult(regNo,candidateExamName,examNo,examDate,examType,sitting) 
            value('$regNo','$candidateExamName1','$examNo1','$examDate1','$examType1','First')");

        //----------------------SECOND------------------------------------

              $queryys2=mysqli_query($con,"insert into tblresult(regNo,candidateExamName,examNo,examDate,examType,sitting) 
            value('$regNo','$candidateExamName2','$examNo2','$examDate2','$examType2','Second')");

        if($queryys1 && $queryys2){

//--------------------FIRST---------------------------

            for($i = 0; $i < $N1; $i++)
            {
                $subject1[$i];
                $grade1[$i];

                $queryy=mysqli_query($con,"insert into tblresultdetails(regNo,subject,grade,sitting) 
                value('$regNo','$subject1[$i]','$grade1[$i]','First')");

                if ($queryy) {

                echo "<script type = \"text/javascript\">
                window.location = (\"resultDetails.php\");
                </script>";
                }
                else
                {
                    $alertStyle ="genric-btn danger";
                    $statusMsg="An error Occurred!";
                }

            }

//--------------------SECOND---------------------------

            for($i = 0; $i < $N2; $i++)
            {
                $subject2[$i];
                $grade2[$i];

                $queryy=mysqli_query($con,"insert into tblresultdetails(regNo,subject,grade,sitting) 
                value('$regNo','$subject2[$i]','$grade2[$i]','Second')");

                if ($queryy) {

                echo "<script type = \"text/javascript\">
                window.location = (\"resultDetails.php\");
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
                        <h3 class="mb-30">Result (First & Second Sitting)</h3>
                         <h3 class="mb-30">First Sitting</h3>
                          <form action="#" method="post">
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            <input name="candidateExamName1" required class="form-control " placeholder="Candidate Exam Name" type="text">
                            </div>
                                <div class="col-xl-6">
                                <input name="examNo1" required class="form-control " placeholder="Exam Number" type="text">
                            </div>
                            </div>
                            <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            <input name="examDate1" required class="form-control " placeholder="Exam Date" type="text">
                            </div>
                                <div class="col-xl-6">
                                <input name="examType1" required class="form-control " placeholder="Exam Type" type="text">
                            </div>
                            </div>

                          <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Subjects
                            </div>
                                <div class="col-xl-6">
                                Grades
                            </div>
                            </div>
                         <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                       <?php
                       for($i = 1; $i <= 9; $i++){

                        //    $quersy= mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
                        //      while ($rowss = mysqli_fetch_array($quersy)) {
                       ?>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                               <?php 
                                    $query=mysqli_query($con,"select * from tblsubjects");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo ' <select name="subject1[]" class="form-control">';
                                        echo'<option value="">--Select Subject--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['subjectName'].'" >'.$row['subjectName'].'</option>';
                                            }
                                                echo '</select>';
                                            }
                                    ?>    
                            </div>
                                <div class="col-xl-6">
                                <input name="grade1[]" required class="form-control " placeholder="Grade" type="text">
                            </div>
                            </div>
                       <?php   }?>                           
                        <br>
<!-- ----------------------------------SECOND SITTING------------------------------------------------------------------------------------------->

                        <h3 class="mb-30">Second Sitting</h3>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            <input name="candidateExamName2"  class="form-control " placeholder="Candidate Exam Name" type="text">
                            </div>
                                <div class="col-xl-6">
                                <input name="examNo2"  class="form-control " placeholder="Exam Number" type="text">
                            </div>
                            </div>
                            <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            <input name="examDate2"  class="form-control " placeholder="Exam Date" type="text">
                            </div>
                                <div class="col-xl-6">
                                <input name="examType2"  class="form-control " placeholder="Exam Type" type="text">
                            </div>
                            </div>

                          <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Subjects
                            </div>
                                <div class="col-xl-6">
                                Grades
                            </div>
                            </div>
                         <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                       <?php
                       for($i = 1; $i <= 9; $i++){

                        //    $quersy= mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
                        //      while ($rowss = mysqli_fetch_array($quersy)) {
                       ?>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                               <?php 
                                    $query=mysqli_query($con,"select * from tblsubjects");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo ' <select name="subject2[]" class="form-control">';
                                        echo'<option value="">--Select Subject--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['subjectName'].'" >'.$row['subjectName'].'</option>';
                                            }
                                                echo '</select>';
                                            }
                                    ?>    
                            </div>
                                <div class="col-xl-6">
                                <input name="grade2[]" required class="form-control " placeholder="Grade" type="text">
                            </div>
                            </div>
                       <?php   }?>
                       
                                
                             <div class="button-group-area mt-40">
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                                <a href="applicantProgramme.php" class="genric-btn success circle"><< Back</a>
                                <a href="documentUploads.php" class="genric-btn success circle">Continue >></a>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
        <!---------------FIRST SITTING--------------------------->      
                           
                            <h3 class="mb-30">Result Details Preview</h3>
                             <h3 class="mb-30">First Sitting</h3>
                             <?php 
                            $quersy = mysqli_query($con,"select * from tblresult where regNo ='$_SESSION[regNo]' and sitting='First'");
                             $row = mysqli_fetch_array($quersy);
                                echo'<div class="form-group row mb-3">
                            <div class="col-xl-12">
                            Candidate ExamName:'.$row['candidateExamName'].'
                            </div>
                                <div class="col-xl-12">
                                Exam Number:'.$row['examNo'].'
                            </div>
                            </div>
                            <div class="form-group row mb-3">
                            <div class="col-xl-12">
                            Exam Date:'.$row['examDate'].'
                            </div>
                                <div class="col-xl-12">
                            Exam Type:'.$row['examType'].'
                            </div>
                            </div>';
                            ?>   
                             <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Subjects
                            </div>
                                <div class="col-xl-6">
                                Grades
                            </div>
                            </div> 
                           <?php 
                            $querssy = mysqli_query($con,"select * from tblresultdetails where regNo ='$_SESSION[regNo]' and sitting='First'");
                            $count = mysqli_num_rows($querssy);
                                $cnt=0;
                            if($count > 0){                       
                                while ($roww = mysqli_fetch_array($querssy)) {
                                echo'<div class="form-group row mb-3">
                            <div class="col-xl-6">
                            '.$roww['subject'].'
                            </div>
                                <div class="col-xl-6">
                            '.$roww['grade'].'
                            </div>
                            </div>  ';
                            }
                                 }
                            ?>    
                        <br>
    <!---------------SECOND SITTING--------------------------->      
                           
                             <h3 class="mb-30">Second Sitting</h3>
                             <?php 
                            $qqu = mysqli_query($con,"select * from tblresult where regNo ='$_SESSION[regNo]' and sitting='Second'");
                             $rrw= mysqli_fetch_array($qqu);
                                echo'<div class="form-group row mb-3">
                            <div class="col-xl-12">
                            Candidate ExamName:'.$rrw['candidateExamName'].'
                            </div>
                                <div class="col-xl-12">
                                Exam Number:'.$rrw['examNo'].'
                            </div>
                            </div>
                            <div class="form-group row mb-3">
                            <div class="col-xl-12">
                            Exam Date:'.$rrw['examDate'].'
                            </div>
                                <div class="col-xl-12">
                            Exam Type:'.$rrw['examType'].'
                            </div>
                            </div>';
                            ?>   
                             <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Subjects
                            </div>
                                <div class="col-xl-6">
                                Grades
                            </div>
                            </div> 
                           <?php 
                            $quy = mysqli_query($con,"select * from tblresultdetails where regNo ='$_SESSION[regNo]' and sitting='Second'");
                            $count = mysqli_num_rows($quy);
                            if($count > 0){                       
                                while ($rowws = mysqli_fetch_array($quy)) {
                                echo'<div class="form-group row mb-3">
                            <div class="col-xl-6">
                            '.$rowws['subject'].'
                            </div>
                                <div class="col-xl-6">
                            '.$rowws['grade'].'
                            </div>
                            </div>  ';
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