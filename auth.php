<?php
session_start();

include("admin/confs/config.php");
include("admin/confs/util.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user_id = $_POST['user_id'];
	$password = $_POST["password"];

	$users = mysqli_query($conn, "SELECT * FROM user WHERE id=$user_id");
	$user_row = mysqli_fetch_assoc($users);

	if ($user_row <> null && password_verify($password, $user_row['password'])) {
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_name'] = $user_row['name'];
		$_SESSION['user_name_jpn'] = $user_row['name_in_jpn'];
		$_SESSION['auth'] = true;
		if (isAdmin($user_row['is_admin'])) {
			$_SESSION['admin'] = true;
		}
		header("location: home.php");
	}else {
		$_SESSION['login_fail'] = true;
		header("location: login.php");
	}

}

?>
