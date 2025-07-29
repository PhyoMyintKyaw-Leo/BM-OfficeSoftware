<?php
include("check_auth.php");
include("confs/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name_eng = $_POST["inputNameEng"];
	$name_mm = $_POST["inputNameMM"];
	$name_jpn = $_POST["inputNameJpn"];
	$hashed_password = password_hash(DEFAULT_PASSWORD, PASSWORD_DEFAULT);
	$role = isset($_POST['admin']) ? 1 : 0;

	$sql = "INSERT INTO user (name, password, is_admin, created_date, modified_date, name_in_mm, name_in_jpn)
					VALUES ('$name_eng', '$hashed_password', '$role', now(), now(), '$name_mm', '$name_jpn')";

	mysqli_query($conn, $sql);
	header("location: user_list.php");
}
?>
