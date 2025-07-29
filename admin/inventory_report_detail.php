<?php
include("check_auth.php");
include("confs/config.php");

$items = $_GET['item_type'] ?? [];
$start_date = $_GET['start_date'] ?? null;
$end_date = $_GET['end_date'] ?? null;

$filter = "";
if (!empty($items)) {
	$escaped_items = array_map(function($item) use ($conn) {
		return "'" . mysqli_real_escape_string($conn, $item) . "'";
	}, $items);
	$filter .= " AND i.name IN (" . implode(",", $escaped_items) . ")";
}
if ($start_date && $end_date) {
	$filter .= " AND h.modified_date BETWEEN '$start_date' AND '$end_date'";
}

$query = "SELECT h.*, u.name AS user_name, i.name AS item_name
					FROM inventory_history h
					JOIN user u ON h.user_id = u.id
					JOIN inventory i ON h.inventory_id = i.id
					WHERE 1=1 $filter
					ORDER BY h.modified_date DESC";

$item_list = mysqli_query($conn, $query);
$list_count = mysqli_num_rows($item_list);

$limit_row = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit_row;
$total_pages = ceil($list_count/$limit_row);
$query .= " LIMIT $limit_row OFFSET $offset";
$result = mysqli_query($conn,$query);
if (!$result) {
	die("Query Failed: " . mysqli_error($conn));
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventory Details | Admin Dashboard</title>
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
	<h1>Inventory Details Search Result</h1>
	<?php if (mysqli_num_rows($item_list) == 0): ?>
		<div class="alert-text"><strong>No data found for the selected filters.</strong></div>
	<?php else: ?>
	<table class="inventory-table">
		<thead>
			<tr>
				<th>No</th>
				<th>User Name</th>
				<th>Item Name</th>
				<th>Remark</th>
				<th>Quantity</th>
				<th>Ramaining Quantity</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = $offset;
				while ($item_row = mysqli_fetch_assoc($result)) {
					$count = $count + 1;
				?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $item_row['user_name'] ?></td>
				<td><?php echo $item_row['item_name'] ?></td>
				<td><?php echo $item_row['remark'] ?></td>
				<td class="td-quantity"><?php echo $item_row['count'] ?></td>
				<td class="td-quantity"><?php echo $item_row['total_count'] ?></td>
				<td><?php echo $item_row['modified_date'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="pagination">
		<?php
			// Rebuild query string for filter params
			$queryParams = $_GET;
		?>

		<?php if ($page > 1): ?>
			<?php $queryParams['page'] = $page - 1; ?>
			<a href="?<?php echo http_build_query($queryParams); ?>">&laquo; Prev</a>
		<?php endif; ?>

		<?php if ($total_pages > 1): ?>
			<?php for ($i = 1; $i <= $total_pages; $i++): ?>
				<?php
					$queryParams['page'] = $i;
					$class = $i == $page ? 'current' : '';
				?>
				<a href="?<?php echo http_build_query($queryParams); ?>" class="<?php echo $class; ?>">
					<?php echo $i; ?>
				</a>
			<?php endfor; ?>
		<?php endif; ?>

		<?php if ($page < $total_pages): ?>
			<?php $queryParams['page'] = $page + 1; ?>
			<a href="?<?php echo http_build_query($queryParams); ?>">Next &raquo;</a>
		<?php endif; ?>
		<span><a href="inventory.php">Back</a></span>
	</div>
</div>
<?php endif; ?>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
 </html>