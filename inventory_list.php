<?php
include("check_auth.php");
$GLOBALS['dataFile'] = "data.txt";
include("admin/confs/config.php");

$computers = mysqli_query($conn, "SELECT * FROM computer");
$users = mysqli_query($conn, "SELECT * FROM user");
$inventory = mysqli_query($conn, "SELECT * FROM inventory");

$currentUserId = $_SESSION['user_id'];
$currentUser = mysqli_query($conn, "SELECT * FROM user WHERE id=$currentUserId");
$currentUser_row = mysqli_fetch_assoc($currentUser);
?>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/navbar.css">
	<link rel="stylesheet" href="assets/css/index.css">
	<title>Inventory List | HISTORY</title>
</head>
<body>
	<?php
	include("navbar.php");
	if (!file_exists($dataFile)) {
		$myfile = fopen($dataFile, "w");
		fclose($myfile);
	}
	?>
<div class="main-content">
	<h1>Inventory List</h1>
	<table class="inventory-table">
		<thead>
			<tr>
				<th>No</th>
				<th>Item Name</th>
				<th>Remaining Quantity</th>
				<th>Take Out</th>
				<th>History</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = 0;
				while ($inventory_row = mysqli_fetch_assoc($inventory)) {
					$count = $count + 1;
			?>
			<tr class="inventory-tr">
				<td><?php echo $count ?></td>
				<td><?php echo $inventory_row['name'] ?></td>
				<td><?php echo $inventory_row['count'] ?></td>
				<td>
					<div class="form-group">
						<form action="u_inventory_edit.php" method="post">
							<input type="hidden" name="id" value="<?php echo $inventory_row['id'] ?>">
							<input type="hidden" name="user_id" value="<?php echo $currentUser_row['id'] ?>">
							<input class="take-out-btn" type="submit" name="submit" value="Take Out">
						</form>
					</div>
				</td>
				<td>
					<div class="form-group">
						<form action="u_inventory_history.php" method="post">
							<input type="hidden" name="id" value="<?php echo $inventory_row['id'] ?>">
							<input type="hidden" name="user_id" value="<?php echo $currentUser_row['id'] ?>">
							<input class="history-btn" type="submit" name="submit" value="History">
						</form>
					</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>