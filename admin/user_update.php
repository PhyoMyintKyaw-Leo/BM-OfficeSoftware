<?php
include("check_auth.php");

include("confs/config.php");
$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
$name_eng = $_POST['nameEng'];
$name_mm = $_POST['nameMM'];
$name_jpn = $_POST['nameJpn'];
$role = isset($_POST['admin']) ? 1 : 0;
$password = '';

// Check if the password is set and not empty
if (isset($_POST['password']) && !empty($_POST['password'])) {
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

// Build the query
$sql = "UPDATE user SET name='$name_eng', is_admin='$role', modified_date=now(), name_in_mm='$name_mm', name_in_jpn='$name_jpn'";
if (!empty($password)) {
	$sql .= ", password='$password'";
}
$sql .= " WHERE id=$id";

// Execute the query
mysqli_query($conn, $sql);

//if admin user uncheck admin, delete admin session
if ($role === 0 && $id == $_SESSION['user_id'] && isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
	header("location: user_list.php");
	exit;
}
header("location: user_list.php");
?>
