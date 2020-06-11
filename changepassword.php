<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['userid'])) {
	header('location:index.php');
}
$pic = $_SESSION["UserData"]["pic"];
$oldpwd = $newpwd = $cnewpwd = $status = $msgchg = "";

if (isset($_POST['change'])) {

	$oldpwd = $_POST['oldpwd'];
	$newpwd = $_POST['newpwd'];
	$cnewpwd = $_POST['cnewpwd'];

	$oldPass = "select password from student_login where sid='$_SESSION[userid]'";
	$chgPwd = "UPDATE `student_login` SET `password`='$newpwd' WHERE sid='$_SESSION[userid]'";

	$result = mysqli_query($con, $oldPass);
	$row = mysqli_fetch_assoc($result);
	if ($row["password"] == $oldpwd) {

		if ($newpwd == $cnewpwd) {

			$status = mysqli_query($con, $chgPwd);
			if ($status == 1) {

				$msgchg = "Your password has chnaged sucessfully.";
			}
		} else {
			$msgchg = "New Password and Confirm Password is not same.";
		}
	} else {
		$msgchg = "Old Password that you have entered, is not correct.";
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
				<div class="panel-heading">Change Password</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" id="oldpwd" class="form-control" placeholder="Enter Your Old Password" required name="oldpwd" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" id="newpwd" class="form-control" placeholder="Enter Your New Password" required name="newpwd" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" value="" class="form-control" id="cnewpwd" placeholder="Confirm Your New Password" required name="cnewpwd" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" class="btn btn-primary" name="change" onclick="javascript: return changeValidate(this);">Change</button>
								<button type="reset" class="btn btn-primary"> Clear</button>
							</div>
						</div>
					</form>
					<span style="color: green; font-weight: bold;"><?php echo $msgchg; ?></span>

				</div>

			</div>
		</div>

	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>