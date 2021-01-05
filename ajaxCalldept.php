<?php

    include('includes/dbconnection.php');
    include('includes/session.php');


    $fid = intval($_GET['fid']);//

        $queryss=mysqli_query($con,"select * from tbldepartment where facultyId=".$fid." ORDER BY departmentName ASC");                        
        $countt = mysqli_num_rows($queryss);

        if($countt > 0){    
        echo '<select class="form-select" required name="departmentId">';
        echo'<option value="">--Select Department--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Id'].'" >'.$row['departmentName'].'</option>';
        }
        echo '</select>';
        }

?>

