<?php

include('includes/config.php');

    $did = intval($_GET['did']);

        $queryss=mysqli_query($con,"select * from tblblooddonars where id=".$did."");                        
        $countt = mysqli_num_rows($queryss);
      
        if($queryss){               
          $row = mysqli_fetch_array($queryss);
            echo 'Selected Donor BloodGroup: '.$row['BloodGroup'];
            echo '<input type="hidden" name="BloodGroup" value="'.$row['BloodGroup'].'" class="form-control">';
        }

?>

