<?php
include("check_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Add New Item</title>
</head>
<body>
	<div class="login-container">
		<form class="login-form" action="inventory_add.php" method="POST" id="addNewInventory">
			<div>
				<img src="../img/Logo.jpg" class="img">
			</div>
			<h2>Add New Items</h2>

			<label for="inputName">Item Name</label>
			<br>
			<div class="form-group">
				<input type="text" class="form-control" id="inputName" name="item-name" maxlength="50" pattern=".*\S+.*"/>
			</div>

			<label for="inputName">Quatiity</label>
			<br>
			<div class="form-group">
				<input type="text" class="form-control" id="addQty" name="qty"/>
			</div>
			<span id="error-message" class="error"></span>
			<div class="form-button">
				<input type="submit" name="submit" value="Add">
				<a class="back-btn" href="inventory_list.php">Back</a>
			</div>
		</form>
		<script>
			document.getElementById('addNewInventory').addEventListener('submit', function(event) {
				var addQuantity = parseInt(document.getElementById('addQty').value, 10);
				var errorMessage = document.getElementById('error-message');

				errorMessage.innerHTML = '';
				if (isNaN(addQuantity) || addQuantity < 0){
					event.preventDefault();
					errorMessage.innerHTML = "Error: Please input value number!";
				} else if (addQuantity === 0) {
					event.preventDefault();
					errorMessage.innerHTML = 'Error: Please add item as least one!';
				}
			});
		</script>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>