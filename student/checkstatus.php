<?php
require_once "../common/connect.php";
session_start();
if (!isset($_SESSION['userid'])) {
	header('location:index.php');
}
$pic = $_SESSION["UserData"]["pic"];
$id = $courseid = $msg = $center_alloted = $course_alloted = $Report = "";
$sql = "select courseid from student_info where sid='$_SESSION[userid]'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);

$id = $_SESSION['userid'];
$courseid = $row["courseid"];
if (isset($_POST['check'])) {

	$sqlCheck = "SELECT status,remarks FROM `counsell_status` where sid='$_SESSION[userid]'";

	$result1 = mysqli_query($con, $sqlCheck);
	$row1 = mysqli_fetch_assoc($result1);
	if ($row1["status"] == NULL) {
		$msg = "<p>You have not submitted your Counselling Application. Please click on the Apply for Counselling Option and follow the instructions. <br> Thank You. </p>";
	} elseif ($row1["status"] == 'under process') {

		$msg = "<p>Hey $_SESSION[username], Your application for counselling is under process. Have patience for Bright Opportunity.</p>";
	} elseif ($row1["status"] == 'alloted') {

		$sqlCheck2 = "SELECT `center_alloted`, `course_alloted`, `Reporting` FROM `allotment` WHERE sid='$_SESSION[userid]'";
		$result2 = mysqli_query($con, $sqlCheck2);

		$row2 = mysqli_fetch_assoc($result2);
		$center_alloted = $row2["center_alloted"];
		$course_alloted = $row2["course_alloted"];
		$Report = $row2["Reporting"];

		$msg = "<p>Hey $_SESSION[username],<br> Congratulations. Course and center has been alloted to you.<br> Details are as follows:<br> Center Alloted : $center_alloted <br> Course Alloted : $course_alloted<br> Reporting Date : $Report<br> We wish you for your Bright Future.<br> Come, Explore and Reposition yourself into the World.<br> A mail enclosed with a call letter has been sent to your email id. Check your email.";
	}
}

?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/student.side-bar.php" ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Get Your Counselling Status Here.</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $id; ?>" class="form-control" name="Email" readonly="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="course" readonly="" value="<?php echo $courseid; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" name="check" class="btn btn-primary">Status</button>
							</div>
						</div>
					</form>
					<div class="panel panel-primary" style="min-height: 70px; padding: 5px;">
						<span style="font-weight: bold;">Hey Look Here. Your Counselling Status is here</span>
						<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
					</div>

				</div>

			</div>

		</div>

	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>