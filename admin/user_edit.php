<?php
include("check_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Edit User</title>
</head>
<body>
	<div class="login-container">
		<?php
			include("confs/config.php");
			include("confs/util.php");
			$user_id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
			if($user_id !== null){
				$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $user_id");
				$user_row = mysqli_fetch_assoc($result);
			}
		?>
		<form class="edit-form" action="user_update.php" method="POST">
			<div>
				<img src="../img/Logo.jpg" class="img">
			</div>
			<h2>Edit User</h2>

			<label for="inputName">User Name (English)</label>
			<br>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $user_row['id'] ?>">
				<input type="text" class="form-control" id="inputNameEng" name="nameEng" value="<?php echo $user_row['name']?>" maxlength="50" pattern=".*\S+.*"/>
			</div>

			<label for="inputName">User Name (Myanmar)</label>
			<br>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $user_row['id'] ?>">
				<input type="text" class="form-control" id="inputNameMM" name="nameMM" value="<?php echo $user_row['name_in_mm']?>" maxlength="50" pattern=".*\S+.*"/>
			</div>

			<label for="inputName">User Name (Japanese-Katakana)</label>
			<br>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $user_row['id'] ?>">
				<input type="text" class="form-control" id="inputNameJpn" name="nameJpn" value="<?php echo $user_row['name_in_jpn']?>" maxlength="50" pattern=".*\S+.*"/>
			</div>

			<label for="inputPassword">Password</label>
			<br>
			<div class="form-group">
				<input type="password" class="form-control" id="inputPassword" name="password"/>
			</div>

			<div class="checkbox">
				<label><input type="checkbox" value="" name="admin" <?php if (isAdmin($user_row['is_admin'])) {echo "checked";}?>> Admin User</label>
			</div>

			<div class="form-button">
				<input type="submit" name="submit" value="Update">
				<a class="back-btn" href="user_list.php">Back</a>
			</div>
		</form>
	</div>
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				const form = document.querySelector("form.edit-form");
				const nameEng = document.getElementById("inputNameEng");
				const nameMM = document.getElementById("inputNameMM");
				const nameJpn = document.getElementById("inputNameJpn");

				const regexEng = /^[A-Za-z\s]+$/;
				const regexMM = /^[\u1000-\u109F\s]+$/;
				const regexJpn = /^[\u3040-\u30FF\s]+$/;

				form.addEventListener("submit", function (event) {
					let errors = [];

					if (!regexEng.test(nameEng.value.trim())) {
						errors.push("Name(English) must contain only English letters and spaces.");
					}
					if (!regexMM.test(nameMM.value.trim())) {
						errors.push("Name(Myanmar) must be in Myanmar.");
					}
					if (!regexJpn.test(nameJpn.value.trim())) {
						errors.push("Name(Japanese) must be in Katakana.");
					}

					if (errors.length > 0) {
						event.preventDefault();
						alert(errors.join("\n"));
					}
				});
			});
		</script>
</body>
 <footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>