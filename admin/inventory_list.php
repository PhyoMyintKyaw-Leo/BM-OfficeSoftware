<?php
include("check_auth.php");
include("confs/config.php");

$inventory = mysqli_query($conn, "SELECT * FROM inventory");

?>

<!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventory List | Admin Dashboard</title>
	<script type="text/javascript">
		function refresh() {
			$('#table_form').load(location.href + " #table_form");
		}
		setInterval(refresh, 1000);
	</script>
 </head>
 <body>
	<?php include("admin_navbar.php"); ?>
	<div class="main-content">
		<h1>List of Items</h1>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Edit</th>
					<th>Delete</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count = 0;
				while ($items_row = mysqli_fetch_assoc($inventory)) {
					$count = $count + 1;
			?>
			<tr class="">
				<td><?php echo $count ?></td>
				<td><?php echo $items_row['name'] ?></td>
				<td class="td-quantity"><?php echo $items_row['count']?></td>
				<td>
					<div class="form-group">
						<form action="inventory_edit.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $items_row['id'] ?>">
							<input class="edit-btn" type="submit" name="submit" value="Edit">
						</form>
					</div>
				</td>
				<td>
					<div class="form-group">
						<form action="inventory_del.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $items_row['id'] ?>">
							<input class="delete-btn" type="submit" name="submit" value="Delete">
						</form>
					</div>
				</td>
				<td>
					<?php if (($items_row['count']) < 4){ ?>
						<img src="../assets/img/warning.png">
						<span class="warn-text">Remaining quantities are less.</span>
					<?php }?>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<div class="add-item">
			<a href="inventory_new_item.php">Add New Item</a>
			<a href="inventory.php">Back</a>
		</div>
	</div>
 </body>
 <footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
 </html>