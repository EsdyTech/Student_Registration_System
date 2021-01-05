
<?php
include('dbconnection.php');
session_start(); 

if (isset($_SESSION['regNo']))
{
    $regNo = $_SESSION['regNo'];

    $query = mysqli_query($con,"select * from tblinitialreg where regNo ='$regNo'");
    $count = mysqli_num_rows($query);
    $rows = mysqli_fetch_array($query);
   
}

else{
  echo "<script type = \"text/javascript\">
  window.location = (\"index.php\");
  </script>";

}

// $expiry = 1800 ;//session expiry required after 30 mins
// if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {

//     session_unset();
//     session_destroy();
//     echo "<script type = \"text/javascript\">
//           window.location = (\"../index.php\");
//           </script>";

// }
// $_SESSION['LAST'] = time();
    
?>