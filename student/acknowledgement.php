<?php
require_once "../common/connect.php";
session_start();
if (!isset($_SESSION['userid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
$msgError = "";
$basicDetails = array();

$basicDetails[0] = $_SESSION['username'];
$basicDetails[1] = $_SESSION['courseid'];

// Fetching Basic Information

$sqlBasic = "SELECT category, rank_scored FROM `student_info` WHERE sid='$_SESSION[userid]'";
$result = mysqli_query($con, $sqlBasic);
$row = mysqli_fetch_array($result);

// Fetching Personal Details

$pDetails = "SELECT * FROM `personal_details` WHERE sid='$_SESSION[userid]'";
$result1 = mysqli_query($con, $pDetails);
$row1 = mysqli_fetch_array($result1);

//Fetching Address Details

$address = "SELECT * FROM `address` WHERE sid='$_SESSION[userid]'";
$result2 = mysqli_query($con, $address);
$row2 = mysqli_fetch_array($result2);


$choice = "SELECT * FROM `course_choice` WHERE sid='$_SESSION[userid]'";
$data = mysqli_query($con, $choice);
$datarow = mysqli_fetch_array($data);

$UrduSports = "SELECT * FROM `studiedurduandsports` WHERE sid='$_SESSION[userid]'";
$dataFetch = mysqli_query($con, $UrduSports);
$datarowFetch = mysqli_fetch_array($dataFetch);
?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">

		<div class="col-sm-12 col-xs-12">
			<div id="printArea">
				<div class="panel panel-primary">
					<div class="panel-heading" style="font-weight: bold;"> Acknowledgement Online Counselling System</div>
					<div class="panel-body">
						<table class="table table-responsive">
							<tr>
								<td style="font-weight: bold">Basic Information</td>
							</tr>
							<tr>
								<td>Name </td>
								<td><?php echo $basicDetails[0]; ?></td>
								<td>Course </td>
								<td><?php echo $basicDetails[1]; ?></td>
							</tr>
							<tr>
								<td>Category </td>
								<td><?php echo $row[0]; ?></td>
								<td>Rank Scored </td>
								<td><?php echo $row[1]; ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Personal Details</td>
							</tr>
							<tr>
								<td>Father's Name </td>
								<td><?php echo $row1[1]; ?></td>
								<td>Mother's Name </td>
								<td><?php echo $row1[2]; ?></td>
							</tr>
							<tr>
								<td>DOB </td>
								<td><?php echo $row1[3]; ?></td>
								<td>Nationality </td>
								<td><?php echo $row1[4]; ?></td>
							</tr>
							<tr>
								<td>Religion </td>
								<td><?php echo $row1[5]; ?></td>
								<td>Family Income </td>
								<td><?php echo $row1[6]; ?></td>
							</tr>
							<tr>
								<td>Mobile No </td>
								<td><?php echo $row1[7]; ?></td>
								<td>Parents Mobile No</td>
								<td><?php echo $row1[8]; ?></td>
							</tr>
							<tr>
								<td>E-mail </td>
								<td><?php echo $row1[9]; ?></td>
								<td>Aadhar No </td>
								<td><?php echo $row1[10]; ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Addresses</td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Correspondence Address</td>
							</tr>
							<tr>
								<td>Vill/Mohalla/Colony </td>
								<td><?php echo $row2[1]; ?></td>
								<td>Post Office </td>
								<td><?php echo $row2[2]; ?></td>
							</tr>
							<tr>
								<td>Police Station </td>
								<td><?php echo $row2[3]; ?></td>
								<td>District </td>
								<td><?php echo $row2[4]; ?></td>
							</tr>
							<tr>
								<td>State </td>
								<td><?php echo $row2[5]; ?></td>
								<td>PIN Code </td>
								<td><?php echo $row2[6]; ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Permanent Address</td>
							</tr>
							<tr>
								<td>Vill/Mohalla/Colony </td>
								<td><?php echo $row2[7]; ?></td>
								<td>Post Office </td>
								<td><?php echo $row2[8]; ?></td>
							</tr>
							<tr>
								<td>Police Station </td>
								<td><?php echo $row2[9]; ?></td>
								<td>District </td>
								<td><?php echo $row2[10]; ?></td>
							</tr>
							<tr>
								<td>State </td>
								<td><?php echo $row2[11]; ?></td>
								<td>PIN Code </td>
								<td><?php echo $row2[12]; ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold;">Educational Details</td>
							</tr>
							<tr>
								<th>Exam Name</th>
								<th>Board</th>
								<th>Subjects</th>
								<th>Passing Year</th>
								<th>Obtained Marks</th>
								<th>Total Marks</th>
								<th>Result</th>
							</tr>
							<?php

							$selectData = "SELECT * FROM `qualification` WHERE sid='$_SESSION[userid]'";

							$result3 = mysqli_query($con, $selectData);

							while ($row = mysqli_fetch_array($result3)) {

								$examName = $row[1];
								$board = $row[2];
								$subjects = $row[3];
								$PassingYear = $row[4];
								$ObtainedMarks = $row[5];
								$TotalMarks = $row[6];
								$resultData = $row[7];

								echo "<tr>
								        <td>$examName</td>
								        <td>$board</td>
								        <td>$subjects</d>
								        <td>$PassingYear</td>
								        <td>$ObtainedMarks</td>
								        <td>$TotalMarks</td>
								        <td>$resultData</td>
								      </tr>";
							}
							?>
							<tr>
								<th>Are you Studied Urdu ?</th>
								<td><?php echo $datarowFetch[1] ?></td>
							</tr>
							<tr>
								<th>Level of Study Urdu</th>
								<td><?php echo $datarowFetch[2] ?></td>
							</tr>
							<tr>
								<th>Are you Sports Person ?</th>
								<td><?php echo $datarowFetch[3] ?></td>
							</tr>

							<tr>
								<td style="font-weight: bold;">Course Choices</td>
							</tr>
							<tr>
								<th>Choice Priority</th>
								<th>Center</th>
								<th>Course</th>
							</tr>
							<tr>
								<td>1st</td>
								<td><?php echo $datarow[2]; ?></td>
								<td><?php echo $datarow[3]; ?></td>
							</tr>
							<tr>
								<td>2nd</td>
								<td><?php echo $datarow[4]; ?></td>
								<td><?php echo $datarow[5]; ?></td>
							</tr>
							<tr>
								<td>3rd</td>
								<td><?php echo $datarow[6]; ?></td>
								<td><?php echo $datarow[7]; ?></td>
							</tr>
						</table>
						<form action="" method="post">
							<div class="form-group">
								<div class="col-xs-12 col-sm-10">
									<button class="btn btn-primary" name="print" onclick="printDiv('printArea');">Print <i class="fa fa-print"></i></button>

								</div>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>