<?php
include("check_auth.php");
include("confs/config.php");

$limit_row = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit_row;
$total_com = mysqli_query($conn, "SELECT COUNT(*) AS total FROM computer");
$total_row = mysqli_fetch_assoc($total_com)['total'];
$total_pages = ceil($total_row/$limit_row);
$computers = mysqli_query($conn, "SELECT * FROM computer ORDER BY created_date DESC LIMIT $limit_row OFFSET $offset");
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Computer List | Admin Dashboard</title>
	<script type="text/javascript">
		function refresh() {
			$('#table_form').load(location.href + " #table_form");
		}
		setInterval(refresh, 1000);
	</script>
 </head>
 <body>
	<?php include("admin_navbar.php"); ?>
	<div class="user-content">
		<h1>List of Senyo Computers</h1>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Computer Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count = $offset;
				while ($computers_row = mysqli_fetch_assoc($computers)) {
					$count = $count + 1;
			?>
			<tr class="computer-tr">
				<td><?php echo $count ?></td>
				<td><?php echo $computers_row['name'] ?></td>
				<td>
					<div class="form-group">
						<form action="com_edit.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $computers_row['id'] ?>">
							<input type="hidden" name="com_name" value="<?php echo $computers_row['name'] ?>">
							<input class="edit-btn" type="submit" name="submit" value="Edit">
						</form>
					</div>
				</td>
				<td>
					<div class="form-group">
						<form action="com_del.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $computers_row['id'] ?>">
							<input class="delete-btn" type="submit" name="submit" value="Delete">
						</form>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<div class="com-pagination">
			<?php if ($page > 1): ?>
				<a href="?page=<?php echo $page - 1; ?>">&laquo; Prev</a>
			<?php endif; ?>

			<?php if ($total_pages > 1): ?>
				<?php for ($i = 1; $i <= $total_pages; $i++): ?>
					<a href="?page=<?php echo $i; ?>" class="<?php if ($i == $page) echo 'current'; ?>">
						<?php echo $i; ?>
					</a>
				<?php endfor; ?>
			<?php endif; ?>

			<?php if ($page < $total_pages): ?>
				<a href="?page=<?php echo $page + 1; ?>">Next &raquo;</a>
			<?php endif; ?>

			<a class="com-add" href="com_new.php">Add New Computer</a>
		</div>
	</div>
 </body>
 <footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
 </html>