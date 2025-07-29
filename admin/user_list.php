<?php
include("check_auth.php");
include("confs/config.php");

$limit_row = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit_row;
$total_user = mysqli_query($conn, "SELECT COUNT(*) AS total FROM user");
$total_row = mysqli_fetch_assoc($total_user)['total'];
$total_pages = ceil($total_row/$limit_row);
$users = mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC LIMIT $limit_row OFFSET $offset");
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User List | Admin Dashboard</title>
 </head>
 <body>
	<?php include("admin_navbar.php"); ?>
	<div class="user-content">
		<h1>List of Users</h1>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>User Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count = $offset;
				while ($user_row = mysqli_fetch_assoc($users)) {
					$count = $count + 1;
			?>
			<tr class="computer-tr">
				<td><?php echo $count ?></td>
				<td><?php echo $user_row['name'] ?></td>
				<td>
					<div class="form-group">
						<form action="user_edit.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $user_row['id'] ?>">
							<input type="hidden" name="com_name" value="<?php echo $user_row['name'] ?>">
							<input class="edit-btn" type="submit" name="submit" value="Edit">
						</form>
					</div>
				</td>
				<td>
					<div class="form-group">
						<form action="user_del.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $user_row['id'] ?>">
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

			<a class="com-add" href="user_new.php">Add New User</a>
		</div>
	</div>
 </body>
 <footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
 </html>