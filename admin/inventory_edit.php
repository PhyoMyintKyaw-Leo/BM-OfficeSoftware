<?php
include("check_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Edit Items</title>
</head>
<body>
	<div class="login-container">
		<?php
			include("confs/config.php");
			$item_id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
			if($item_id  !== null){
				$result = mysqli_query($conn, "SELECT * FROM inventory WHERE id = $item_id ");
				$item_row = mysqli_fetch_assoc($result);
			}
		?>
		<form class="login-form" action="inventory_update.php" method="POST">
			<div>
				<img src="../img/Logo.jpg" class="img">
			</div>
			<h2>Edit Inventory</h2>

			<label for="inputName">Name</label>
			<br>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $item_row['id'] ?>">
				<input type="text" class="form-control" id="inputName" name="name" value="<?php echo $item_row['name']?>" maxlength="50" pattern=".*\S+.*"/>
			</div>

			<label for="inputName">Remaining Quatiity</label>
			<br>
			<div class="form-group">
				<input type="text" class="form-control" id="remainQty" name="remain" value="<?php echo $item_row['count']?>" disabled/>
			</div>

			<label for="inputName">Add items</label>
			<br>
			<div class="form-group">
				<input type="text" class="form-control" id="addQty" name="add" value=""/>
			</div>
			<div class="form-button">
				<input type="submit" name="submit" value="Update">
				<a class="back-btn" href="inventory_list.php">Back</a>
			</div>
		</form>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>