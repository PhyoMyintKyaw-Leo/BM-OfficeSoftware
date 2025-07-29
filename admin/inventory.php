<?php
include("check_auth.php");
include("confs/config.php");

$total_items = mysqli_query($conn, "SELECT COUNT(*) as total FROM inventory");
$total_quantity = mysqli_query($conn, "SELECT SUM(count) as total_qty FROM inventory");
$low_stock = mysqli_query($conn, "SELECT * FROM inventory WHERE count < 2");
$most_stocked = mysqli_query($conn, "SELECT * FROM inventory ORDER BY count DESC LIMIT 1");

$total = mysqli_fetch_assoc($total_items)['total'];
$qty = mysqli_fetch_assoc($total_quantity)['total_qty'];
$most = mysqli_fetch_assoc($most_stocked);
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/report.css">
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventory Report | Admin Dashboard</title>
	<script type="text/javascript">
		function refresh() {
			$('#table_form').load(location.href + " #table_form");
		}
		setInterval(refresh, 1000);
	</script>
 </head>
 <body>
	<?php include("admin_navbar.php"); ?>
	<div class="report-container">
		<h1>Inventory Report</h1>

		<form class="filter-section" method="GET" action="">
			<fieldset>
				<legend>Select Item Types:</legend>
				<?php
					$items = mysqli_query($conn, "SELECT DISTINCT name FROM inventory ORDER BY name ASC");
					while($item = mysqli_fetch_assoc($items)) {?>
						<label><input type="checkbox" class="item-type" name="item_type[]" value="<?php echo $item['name'] ?>" id="item_<?php echo $item['name'] ?>"> <?php echo $item['name'] ?> </label>
				<?php }?>
				<label><input type="checkbox" name="all-select" value="all" id="selectAll">Select all</label>
			</fieldset>

			<label>Seclec Date Range:</label>
			<div class="date-range">
				<label>From: <input type="date" name="start_date"></label>
				<label>To: <input type="date" name="end_date"></label>
			</div>

			<div class="action-buttons">
				<button type="submit" formaction="inventory_report_summary.php">Summary Data</button>
				<button type="submit" formaction="inventory_report_detail.php">Detail Data</button>
				<button type="submit" formaction="inventory_list.php">Update Data</button>
			</div>

			<div class="summary-cards">
				<div class="card">
					<h3>Total Item Types</h3>
					<p><?php echo $total; ?></p>
				</div>
				<div class="card">
					<h3>Total Quantity</h3>
					<p><?php echo $qty; ?></p>
				</div>
				<div class="card">
					<h3>Top Item</h3>
					<p><?php echo $most['name'] . " (" . $most['count'] . ")"; ?></p>
				</div>
			</div>
		</form>
	</div>
	<script>
		document.getElementById('selectAll').addEventListener('change', function(){
			const checkboxes = document.querySelectorAll('.item-type');
			checkboxes.forEach(cb => cb.checked = this.checked);
		});
	</script>
 </body>
 <footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
 </html>