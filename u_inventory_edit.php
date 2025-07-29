<?php
include("check_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Take Out Items</title>

</head>
<body>
	<div class="login-container">
		<?php
			include("admin/confs/config.php");
			$item_id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
			if($item_id !== null){
				$result = mysqli_query($conn, "SELECT * FROM inventory WHERE id = $item_id");
				$item_row = mysqli_fetch_assoc($result);
				$user_id = $_POST['user_id'];
			}else{
				echo "<p style='color: red;'>No inventory ID provided.</p>";
			}
		?>

		<form class="login-form" action="u_inventory_update.php" method="POST" id="quantityForm">
			<div>
				<img src="./img/Logo.jpg" class="img">
			</div>
			<h2>Take Out items</h2>
			<label for="inputName">Item Name</label>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $item_row['id'] ?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id?>">
				<input type="text" class="form-control" id="inputName" value="<?php echo $item_row['name'] ?>" readonly />
			</div>

			<label for="remainQty">Remain Quantity</label>
			<div class="form-group">
				<input type="label" class="form-control" id="remainQty" name="remain" value="<?php echo $item_row['count'] ?>" readonly/>
			</div>

			<label for="OutQty">Take Out Quantity</label>
			<div class="form-group">
				<input type="text" class="form-control" id="OutQty" name="out" min="1" maxlength="2"/>
			</div>
			<span id="error-message" style="color: red;"></span><br><br>

			<div class="edit-inv-btn">
				<button type="submit" name="submit">Update</button>
				<a class="back-btn" href="inventory_list.php">Back</a>
			</div>
		</form>
		<script>
			document.getElementById('quantityForm').addEventListener('submit', function(event) {
				var remainingQuantity = parseInt(document.getElementById('remainQty').value, 10);
				var takeOutQuantity = parseInt(document.getElementById('OutQty').value, 10);
				var errorMessage = document.getElementById('error-message');

				errorMessage.innerHTML = '';
				if (isNaN(takeOutQuantity) || takeOutQuantity < 0){
					event.preventDefault();
					errorMessage.innerHTML = "Please input valid number!";
					}else if (takeOutQuantity === 0) {
					event.preventDefault();
					errorMessage.innerHTML = 'Please Take Out at least one!';
					}else if (takeOutQuantity > remainingQuantity) {
					event.preventDefault();
					errorMessage.innerHTML = 'You cannot take out more than the remaining quantity!';
					}
				});
		</script>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>