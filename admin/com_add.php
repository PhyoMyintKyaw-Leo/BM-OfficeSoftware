<?php
include("check_auth.php");

include("confs/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];

	$sql = "INSERT INTO computer (name, created_date, modified_date)
					VALUES ('$name', now(), now())";

	mysqli_query($conn, $sql);
	header("location: com_list.php");
}
?>
