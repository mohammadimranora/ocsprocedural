<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
date_default_timezone_set('Asia/Kolkata');
$date = date("jS \of F Y");
$time = date("h:i:s A");

$qualified = "SELECT COUNT(sid) from student_info";
$result = mysqli_query($con, $qualified);
$rowqualified = mysqli_fetch_array($result);

$applied = "SELECT COUNT(sid) FROM `counsell_status`";
$result1 = mysqli_query($con, $applied);
$rowapplied = mysqli_fetch_array($result1);

$isurdu = "SELECT COUNT(isstudiedurdu), COUNT(issportsperson) FROM `studiedurduandsports`";
$result2 = mysqli_query($con, $isurdu);
$rowisurdu = mysqli_fetch_array($result2);

$firstHyd = "SELECT COUNT(sid) FROM `course_choice` WHERE center='HYDERABAD'";
$result3 = mysqli_query($con, $firstHyd);
$rowhyderabad = mysqli_fetch_array($result3);

$firstBang = "SELECT COUNT(sid) FROM `course_choice` WHERE center='BANGALORE'";
$result4 = mysqli_query($con, $firstBang);
$rowbang = mysqli_fetch_array($result4);


$firstDar = "SELECT COUNT(sid) FROM `course_choice` WHERE center='DARBHANGA'";
$result5 = mysqli_query($con, $firstDar);
$rowdar = mysqli_fetch_array($result5);

$firstKad = "SELECT COUNT(sid) FROM `course_choice` WHERE center='KADAPA'";
$result6 = mysqli_query($con, $firstKad);
$rowkad = mysqli_fetch_array($result6);

$firstCut = "SELECT COUNT(sid) FROM `course_choice` WHERE center='CUTTACK'";
$result7 = mysqli_query($con, $firstCut);
$rowcut = mysqli_fetch_array($result7);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Counselling Statistics | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" href="./index_files/custom.css">
	<script src="./index_files/jquery.min.js.download"></script>
	<script src="./index_files/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
</head>

<body>

	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/user.navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<div class="col-sm-3 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Dashboard- CAC
					</div>
					<div class="panel-body">
						<div class="msgimg">
							<img src="./index_files/img_avatar.png" style=" width: 100px;">

						</div>
						<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
							<li><a href="cacindex.php">Home</a></li>
							<li><a href="allotment.php">Allot Seat & Center</a></li>
							<li><a href="verify.php">Verify Document</a></li>
							<li><a href="enrollmentno.php">Generate Enrollment No</a></li>
							<li class="active"><a href="stats.php">Generate Stats</a></li>
							<li><a href="search.php">Search Student</a></li>
							<li><a href="report.php" target="_blank">Generate Report</a></li>
							<li><a href="enablepay.php">Enable Payment</a></li>
							<li><a href="cacchangepassword.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Counselling Statistics</div>
					<div class="panel-body" id="PrintArea">
						<table class="table table-responsive" style="font-family:serif; font-weight: bold;">
							<thead>
								<center>
									<p style="font-weight: bold; color:  blue;">Counselling Statistics</p>
								</center>
							</thead>
							<tr>
								<td style="font-weight: bold;">Date: <?php echo $date; ?></td>
								<td style="text-align: right; font-weight: bold;">Time: <?php echo $time ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Students qualified:&nbsp<?php echo $rowqualified[0]; ?></td>
								<td>Students applied:&nbsp<?php echo $rowapplied[0]; ?></td>
							</tr>
							<tr>
								<td>Students studied Urdu:&nbsp<?php echo $rowisurdu[0]; ?></td>
								<td>Students are sports person:&nbsp<?php echo $rowisurdu[1]; ?></td>
							</tr>
							<tr>
								<td>Students selected Hyderabad as 1st choice:&nbsp<?php echo $rowhyderabad[0]; ?></td>
								<td>Students selected Bangalore as 1st Choice:&nbsp<?php echo $rowbang[0]; ?></td>
							</tr>
							<tr>
								<td>Students selected Darbhanga as 1st choice:&nbsp<?php echo $rowdar[0]; ?></td>
								<td>Students selected Kadapa as 1st Choice:&nbsp<?php echo $rowkad[0]; ?></td>
							</tr>
							<tr>
								<td>Students selected Cuttak as 1st choice:&nbsp<?php echo $rowcut[0]; ?></td>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
				<center>
					<form action="" method="post">
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print Report <i class="fa fa-print"></i></button>
							</div>
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>