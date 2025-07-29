<?php
include("check_auth.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Add New User</title>
</head>
<body>
	<div class="login-container">
		<form class="login-form" action="user_add.php" method="POST">
			<div>
				<img src="../img/Logo.jpg" class="img">
			</div>
			<h2>Add New User</h2>
			<label for="inputName">User Name (English) </label>
			<br><br>
			<div class="form-group">
				<input type="text" id="inputNameEng" placeholder="Name in English" name="inputNameEng" maxlength="50" required pattern=".*\S+.*" />
			</div>

			<label for="inputName">User Name (Myanmar) </label>
			<br><br>
			<div class="form-group">
				<input type="text" id="inputNameMM" placeholder="Name in Myanmar" name="inputNameMM" maxlength="50" required pattern=".*\S+.*" />
			</div>

			<label for="inputName">User Name (Japanese-Katakana) </label>
			<br><br>
			<div class="form-group">
				<input type="text" id="inputNameJpn" placeholder="Name in Japanese" name="inputNameJpn" maxlength="50" required pattern=".*\S+.*" />
			</div>

			<div class="checkbox">
				<label><input type="checkbox" value="" name="admin"> Admin User</label>
			</div>

			<div class="form-button">
				<input type="submit" name="submit" value="Add">
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