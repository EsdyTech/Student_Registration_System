<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Other Name</th>
											<th>Sex</th>
											<th>Email Address</th>
											<th>Phone No</th>
											<th>Registration No</th>
											<th>Registration Status </th>
											<th>Date Applied </th>
										</tr>
									</thead>

<?php 
$filename="Applicants list";

$cnt=1;			
$ret=mysqli_query($con,"SELECT * from tblinitialreg");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
	$isRegComplete="";
if($row['isRegComplete'] == '1'){$isRegComplete = "Completed";}else{$isRegComplete = "InComplete";}
echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$firstName= $row['firstName'].'</td> 
<td>'.	$lastName= $row['lastName'].'</td> 
<td>'.$otherName= $row['otherName'].'</td> 
<td>'.$sex= $row['sex'].'</td> 
<td>'.$emailAddress= $row['emailAddress'].'</td> 
 <td>'.$phoneNo=$row['phoneNo'].'</td>	
  <td>'.$regNo=$row['regNo'].'</td>	 
   <td>'.$registrationComplete=$isRegComplete.'</td>	
  <td>'.$dateCreated=$row['dateCreated'].'</td>	 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>