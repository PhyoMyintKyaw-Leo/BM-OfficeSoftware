<?php
include("check_auth.php");

$GLOBALS['dataFile'] = "data.txt";
include("admin/confs/config.php");

$computers = mysqli_query($conn, "SELECT * FROM computer");
$users = mysqli_query($conn, "SELECT * FROM user");

$currentUserId = $_SESSION['user_id'];
$currentUser = mysqli_query($conn, "SELECT * FROM user WHERE id=$currentUserId");
$currentUser_row = mysqli_fetch_assoc($currentUser);

$item_id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

if($item_id !== null){
	$item_name = mysqli_query($conn, "SELECT * FROM inventory WHERE id = $item_id");
	$item_name_row = mysqli_fetch_assoc($item_name);

	//Pagination setting
	$limit_row = 10;
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$offset = ($page - 1) * $limit_row;
	$total = mysqli_query($conn, "SELECT COUNT(*) AS total FROM inventory_history WHERE inventory_id = $item_id");
	$total_row = mysqli_fetch_assoc($total)['total'];
	$total_pages = ceil($total_row/$limit_row);

	$item = mysqli_query($conn, "SELECT * FROM inventory_history WHERE inventory_id = $item_id ORDER BY created_date DESC LIMIT $limit_row OFFSET $offset");
}else{
	echo "<p style='color: red;'>No inventory ID provided.</p>";
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/navbar.css">
	<link rel="stylesheet" href="assets/css/index.css">
	<title>Inventory History</title>

</head>
<body>
	<?php
	if (!file_exists($dataFile)) {
		$myfile = fopen($dataFile, "w");
		fclose($myfile);
	}
	include("navbar.php");
	?>
<div class="main-content">
	<h1>Take in & Take out History of <?php echo $item_name_row['name'] ?></h1>
	<table class="inventory-table">
		<thead>
			<tr>
				<th>No</th>
				<th>Date</th>
				<th>User Name</th>
				<th>Remark</th>
				<th>Quantity</th>
				<th>Ramaining Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = $offset;
				while ($item_row = mysqli_fetch_assoc($item)) {
					$count = $count + 1;
					$history_user_id = $item_row['user_id'];
					$user = mysqli_query($conn, "SELECT * FROM user WHERE id=$history_user_id");
					$user_row = mysqli_fetch_assoc($user);
				?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $item_row['created_date'] ?></td>
				<td><?php echo $user_row['name'] ?></td>
				<td><?php echo $item_row['remark'] ?></td>
				<td class="td-quantity"><?php echo $item_row['count'] ?></td>
				<td class="td-quantity"><?php echo $item_row['total_count'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="pagination">
		<?php if ($page > 1): ?>
			<a href="?page=<?php echo $page - 1; ?>&id=<?php echo $item_id ?>">&laquo; Prev</a>
		<?php endif; ?>

		<?php if ($total_pages > 1): ?>
			<?php for ($i = 1; $i <= $total_pages; $i++): ?>
				<a href="?page=<?php echo $i; ?>&id=<?php echo $item_id ?>" class="<?php if ($i == $page) echo 'current'; ?>">
					<?php echo $i; ?>
				</a>
			<?php endfor; ?>
		<?php endif; ?>

		<?php if ($page < $total_pages): ?>
			<a href="?page=<?php echo $page + 1; ?>&id=<?php echo $item_id ?>">Next &raquo;</a>
		<?php endif; ?>
		<span><a href="inventory_list.php">Back</a></span>
	</div>
</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>