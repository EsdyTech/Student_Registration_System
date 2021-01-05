<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<?php include('includes/title.php');
?>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Applicants List</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default" style="width:1550px;">
							<div class="panel-heading" style="width:1550px;">Applicants Info</div>
							<div class="panel-body" style="width:1550px;">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <a href="download-applicantslists.php" style="color:red; font-size:16px;">Click here to Download Applicants List</a>
                <br><br>
								<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Other Name</th>
											<th>Gender</th>
											<th>Email Address</th>
											<th>PhoneNo</th>
                                            <th>RegNo</th>
											<th>Registration Status</th>
                                            <th>Date</th>
                                            <th>Personal Data </th>
                                            <th>Education Details </th>
                                            <th>Result </th>
                                            <th>Documents </th>
                                            <th>Guardian details </th>
                                            <th>NextofKin Details </th>
                                            <th>Programme </th>
                                            <th>Payment </th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>First Name</th>
											<th>Last Name</th>
											<th>Other Name</th>
											<th>Gender</th>
											<th>Email Address</th>
											<th>PhoneNo</th>
                                            <th>RegNo</th>
											<th>Registration Status</th>
                                            <th>Date</th>
                                            <th>Personal Data </th>
                                            <th>Education Details </th>
                                            <th>Result </th>
                                            <th>Documents </th>
                                            <th>Guardian details </th>
                                            <th>NextofKin Details </th>
                                            <th>Programme </th>
                                            <th>Payment </th>
										</tr>
									</tfoot>
									<tbody>

<?php 
$ret=mysqli_query($con,"SELECT * from tblinitialreg");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
	
	?>	
                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($row['firstName']);?></td>
                        <td><?php echo htmlentities($row['lastName']);?></td>
                        <td><?php echo htmlentities($row['otherName']);?></td>
                        <td><?php echo htmlentities($row['sex']);?></td>
                        <td><?php echo htmlentities($row['emailAddress']);?></td>
                        <td><?php echo htmlentities($row['phoneNo']);?></td>
                        <td><?php echo htmlentities($row['regNo']);?></td>
						<td><?php if($row['isRegComplete'] == '1'){echo "Complete";}else{echo "InComplete"; }?></td>
                        <td><?php echo htmlentities($row['dateCreated']);?></td>
                    <td><a href="personal-data.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="education-details.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="result.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="documents-list.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="guardian-details.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="nextOfKin-details.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="programme-details.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
                    <td><a href="payment-details.php?regNo=<?php echo htmlentities($row['regNo']);?>"> View</a></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
