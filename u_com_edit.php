<?php
	include("check_auth.php");

	$share_com_id = $_POST['share_com_id'];
	$com_id = $_POST['com_id'];
	$user_id = $_POST['user_id'];
	$start_time = $_POST['s_time'];
	$estimate_time = $_POST['e_time'];
	$remark = $_POST['remark'];
	$count = $_POST['count'];

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "sanyopc";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_select_db($conn, $dbname);

	$sql = "UPDATE sharing_computer SET row_count = 1, login_user = '$_SESSION[user_id]' WHERE id = $share_com_id";
	mysqli_query($conn, $sql);

	$share_computers = mysqli_query($conn, "SELECT * FROM sharing_computer");
	$share_com_row = mysqli_fetch_assoc($share_computers);

	//Login したUserだったら、自動的表示されるように
	if ($user_id == null) {
		$user_id = $_SESSION['user_id'];
	}

	include("admin/confs/config.php");
	$users = mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC");
	$share_computers = mysqli_query($conn, "SELECT * FROM sharing_computer WHERE id = $share_com_id");
	$share_computers_row = mysqli_fetch_assoc($share_computers);

	$GLOBALS['hasUser'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Use Senyo PC</title>
	<script type="text/javascript">
			function changeBtnOpt(){
				var result = true;
				var cursor = "not-allowed";
				if (document.getElementById('userName').selectedIndex > 0) {
					result = false;
					cursor = "pointer";
				}else {
					result = true;
					cursor = "not-allowed";
				}
				document.getElementById('submitBtn').style.cursor = cursor;
				document.getElementById('submitBtn').disabled = result;
			}
	</script>
</head>
<body>
	<div class="login-container">
		<form class="login-form" action="u_com_update.php" method="POST">
			<h2>Summary For Using PC</h2>
			<label for="computerName">Computer Name</label>
			<div class="form-group">
				<input type="hidden" name="share_computer_id" value="<?php echo $share_computers_row['id'] ?>">
				<input type="text" name="computerName" class="form-control" value="<?php
					$comid = $share_computers_row['com_id'];
					$computer = mysqli_query($conn, "SELECT * FROM computer WHERE id = $comid");
					$computer_row = mysqli_fetch_assoc($computer);
					echo $computer_row['name'] ?>" disabled>
			</div>

			<label for="userName">Choose User</label>
			<div class="form-group">
				<select id="userName" name="user_id" onchange="changeBtnOpt()">
					<option value="0">-- Choose User --</option>
						<?php
							while ($user_row = mysqli_fetch_assoc($users)) {?>
							<option value="<?php echo $user_row['id'] ?>" <?php if ($user_row['id'] == $user_id) {
								echo 'selected';
								$hasUser = true;
								} ?> ><?php echo $user_row['name'] ?>
							</option>
						<?php } ?>
				</select>
			</div>

			<label for="startTime">Start Date/Time (24 hour format)</label>
			<div class="form-group">
				<input type="text" id="startTime" name="startTime" class="form-control" value="<?php echo $start_time ?>">
			</div>

			<label for="estimateTime">Estimate Time</label>
			<div class="form-group">
				<input type="text" id="estimateTime" name="estimateTime" class="form-control" value="<?php echo $estimate_time ?>">
			</div>

			<label for="remark">Remark</label>
			<div class="form-group">
				<textarea name="remark" class="form-control" maxlength="50"><?php echo $remark ?></textarea>
			</div>

			<div class="form-button">
				<input type="submit" name="submit" value="Submit" id="submitBtn"
					<?php if($hasUser){
							echo "style='cursor:pointer'";
						}else{
						echo "disabled style='cursor:not-allowed'";
						}
					?>>
				<a class="back-button" href="index.php">Back</a>
			</div>
		</form>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>