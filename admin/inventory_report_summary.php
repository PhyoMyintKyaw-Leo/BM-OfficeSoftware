<?php
include("check_auth.php");
include("confs/config.php");

$start_date = mysqli_real_escape_string($conn, $_GET['start_date'] ?? '');
$end_date = mysqli_real_escape_string($conn, $_GET['end_date'] ?? '');

$date_range = "";
if ($start_date && $end_date){
	$date_range .= " AND h.modified_date BETWEEN '$start_date' AND '$end_date'";
}

$takeout_query = "SELECT i.name, SUM(h.count) AS takeoutqty
				  FROM inventory_history h
				  JOIN inventory i ON h.inventory_id = i.id
				  WHERE 1=1 $date_range
				  AND h.remark = 'Take Out'
				  GROUP BY i.name
				  ORDER BY i.name ASC";
$outResult = mysqli_query($conn, $takeout_query) or die("Query Failed: " . mysqli_error($conn));
$takeoutdata = [];
while($takeout = mysqli_fetch_assoc($outResult)){
	$takeoutdata[] = $takeout;
}

$takein_query = "SELECT i.name, SUM(h.count) AS takeinqty
				 FROM inventory_history h
				 JOIN inventory i ON h.inventory_id = i.id
				 WHERE 1=1 $date_range
				 AND h.remark = 'Take In'
				 GROUP BY i.name
				 ORDER BY i.name ASC";
$inResult = mysqli_query($conn, $takein_query) or die("Query Failed: " . mysqli_error($conn));
$takeindata = [];
while($takein = mysqli_fetch_assoc($inResult)){
	$takeindata[] = $takein;
}
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/report.css">
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
		<h1>Summary Chart of Inventory</h1>
		<?php if (mysqli_num_rows($outResult) == 0): ?>
			<div class="alert-text"><strong>No data found for the selected filters.</strong></div>
		<?php else: ?>
		<div class="chart">
			<canvas id="summaryChartOut" style="width:100%;max-width:600px"></canvas>
			<canvas id="summaryChartIn" style="width:100%;max-width:600px"></canvas>
		</div>
		<script>

			//Take Out Chart
			const ctxOut = document.getElementById('summaryChartOut').getContext('2d');
			const takeoutitem = <?php echo json_encode(array_column($takeoutdata, 'name')); ?>;
			const takeoutdata = <?php echo json_encode(array_column($takeoutdata, 'takeoutqty')); ?>;
			const takeoutcolors = takeoutitem.map((_, i) => ["red", "green", "blue", "orange", "brown", "grey", "yellow"][i % 7]);
			new Chart(ctxOut, {
			type: "bar",
			data: {
				labels: takeoutitem,
				datasets: [{
					backgroundColor: takeoutcolors,
					data: takeoutdata
				}]
			},
			options: {
				legend: {display: false},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},

				title: {
					display: true,
					text: "Take Out Items Summary bar chart"
					}
			}
		});

			//Take in Chart
			const ctxIn = document.getElementById('summaryChartIn').getContext('2d');
			const takeinitem = <?php echo json_encode(array_column($takeindata, 'name')); ?>;
			const takeindata = <?php echo json_encode(array_column($takeindata, 'takeinqty')); ?>;
			const takeincolors = takeindata.map(val => {
				const count = parseInt(val);
				return count <= 2 ? "red" : (count < 6 ? "yellow" : "green");
			});
			new Chart(ctxIn, {
			type: "bar",
			data: {
				labels: takeinitem,
				datasets: [{
					backgroundColor: takeincolors,
					data: takeindata
				}]
			},
			options: {
				legend: {display: false},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},

				title: {
					display: true,
					text: "Take In Items Summary bar chart"
					}
			}
		});
		</script>
	</div>
	<?php endif; ?>
 </body>
 <footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
 </html>