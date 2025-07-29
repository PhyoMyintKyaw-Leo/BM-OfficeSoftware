<?php
include("check_auth.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Add New Computer</title>
</head>
<body>
	<div class="login-container">
		<form class="login-form" action="com_add.php" method="POST">
			<div>
				<img src="../img/Logo.jpg" class="img">
			</div>
			<h2>Add New Computer</h2>
			<label for="inputName">Computer Name</label>
			<br><br>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $com_row['id'] ?>">
				<input type="text" id="inputName" name="name" maxlength="50" pattern=".*\S+.*"/>
			</div>
			<div class="form-button">
				<input type="submit" name="submit" value="Add">
				<a class="back-btn" href="com_list.php">Back</a>
			</div>
		</form>
	</div>
</body>
</html>

