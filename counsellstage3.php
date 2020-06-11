<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['userid'])) {
	header('location: index.php');
}
$pic = $_SESSION["UserData"]["pic"];

$c_villmohalla1 = $c_post1 = $c_policestation1 = $c_district1 = $c_state1 = $c_pin1 = "";
$c_villmohalla2 = $c_post2 = $c_policestation2 = $c_district2 = $c_state2 = $c_pin2 = "";
$msg = "";
if (isset($_POST['save'])) {

	$c_villmohalla1 = $_POST['villmoh1'];
	$c_post1 = $_POST['post1'];
	$c_policestation1 = $_POST['policestation1'];
	$c_district1 = $_POST['district1'];
	$c_state1 = $_POST['post1'];
	$c_pin1 = $_POST['pin1'];

	$c_villmohalla2 = $_POST['villmoh2'];
	$c_post2 = $_POST['post2'];
	$c_policestation2 = $_POST['policestation2'];
	$c_district2 = $_POST['district2'];
	$c_state2 = $_POST['post2'];
	$c_pin2 = $_POST['pin2'];

	$sqlInsert = "INSERT INTO `address`(`sid`, `c_vill_moh`, `c_post`, `c_ps`, `c_district`, `c_state`, `c_pincode`, `p_vill_moh`, `p_post`, `p_ps`, `p_district`, `p_state`, `p_pincode`) VALUES 
		('$_SESSION[userid]','$c_villmohalla1','$c_post1','$c_policestation1','$c_district1','$c_state1','$c_pin1','$c_villmohalla2','$c_post2','$c_policestation2','$c_district2','$c_state2','$c_pin2')";

	$Status = mysqli_query($con, $sqlInsert);

	if ($Status == 1) {
		header('location: counsellstage4.php');
	} else {
		$msg = "Data have not been saved.";
	}
}
?>
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "includes/student.side-bar.php" ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Address - Step 3</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<label>Correspondence Address<span style="color: red; font-weight: bold;">*</span></label>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control" required="" name="villmoh1" placeholder="Village/Mohalla" id="villmoh1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="post1" placeholder="Post" required="" id="post1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="policestation1" required="" placeholder="Police Station" class="form-control" id="policestation1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="district1" required="" placeholder="District" class="form-control" id="district1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="state1" required="" placeholder="State" class="form-control" id="state1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="pin1" id="pin" required placeholder="PIN Code" class="form-control">
							</div>
						</div>
						<label>
							<p>Is your Correspondence Address is permanent Address<br><label>Yes</label>&nbsp<input type="checkbox" name="isper" onclick="copy(this.form)"><br>
								<label>Permanent Address<span style="color: red; font-weight: bold;">*</span></label>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" required="" name="villmoh2" placeholder="Village/Mohalla">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" name="post2" placeholder="Post" required="">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" name="policestation2" required="" placeholder="Police Station" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" name="district2" required placeholder="District" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" name="state2" required placeholder="State" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" name="pin2" required placeholder="PIN Code" class="form-control">
									</div>
								</div>

								<br>
								<div class="form-group">
									<div class="col-xs-12 col-sm-10">
										<button type="submit" class="btn btn-primary" name="save" onclick="validateAddress();">Save & Next</button>

									</div>
								</div>
					</form>

				</div>

			</div>

		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>