<?php
include("check_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Edit Computers</title>
</head>
<body>
	<div class="login-container">
		<?php
			include("confs/config.php");
			$com_id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
			if($com_id !== null){
				$result = mysqli_query($conn, "SELECT * FROM computer WHERE id = $com_id");
				$com_row = mysqli_fetch_assoc($result);
			}
		?>
		<form class="login-form" action="com_update.php" method="POST">
			<div>
				<img src="../img/Logo.jpg" class="img">
			</div>
			<h2>Edit Computer</h2>
			<label for="inputName">Name</label>
			<br>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $com_row['id'] ?>">
				<input type="text" class="form-control" id="inputName" name="name" value="<?php echo $com_row['name']?>" maxlength="50" pattern=".*\S+.*"/>
			</div>
			<div class="form-button">
				<input type="submit" name="submit" value="Update">
				<a class="back-btn" href="com_list.php">Back</a>
			</div>
		</form>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>