<?php
include("check_auth.php");

include("admin/confs/config.php");
$computers = mysqli_query($conn, "SELECT * FROM computer");
$share_computers = mysqli_query($conn, "SELECT * FROM sharing_computer");
?>

<script type="text/javascript">
	function changeBtnOpt(){
		var result = true;
		var cursor = "not-allowed";
		if (document.getElementById('com_select').selectedIndex > 0) {
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Add New PC</title>
</head>
<body>
	<div class="add-container">
		<form class="login-form" action="u_com_add.php" method="POST">
			<div>
				<img src="./img/Logo.jpg" class="img">
			</div>
			<h2>Add New Senyo Computer</h2>
			<label for="computerName">Computer Name</label>
			<div class="form-group">
				<select name="computer_id" id="com_select" onchange="changeBtnOpt()">
					<option value="0">-- Choose Computer --</option>
						<?php
							while ($com_row = mysqli_fetch_assoc($computers)) {
								$addFlg = true;
								while ($share_com_row = mysqli_fetch_assoc($share_computers)) {
									if ($com_row['id'] == $share_com_row['com_id']) {
										$addFlg = false;
										break;
									}
								}
								if ($addFlg == true) {?>
									<option value="<?php echo $com_row['id'] ?>"><?php echo $com_row['name'] ?></option>
								<?php }?>
						<?php } ?>
				</select>
			</div>

			<div class="add-button">
				<input type="submit" name="submit" value="Add Computer To Dashboard" id="submitBtn">
				<a class="back-button" href="index.php">Back</a>
			</div>
		</form>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>