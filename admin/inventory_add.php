<?php
include("check_auth.php");

include("confs/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["item-name"];
		$qty = $_POST["qty"];

		$sql = "INSERT INTO inventory (name, count, created_date, modified_date)
						VALUES ('$name', $qty, now(), now())";

		mysqli_query($conn, $sql);
		header("location: inventory_list.php");
	}
?>
