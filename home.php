<?php
include("check_auth.php");
$GLOBALS['dataFile'] = "data.txt";
include("admin/confs/config.php");

$computers = mysqli_query($conn, "SELECT * FROM computer");
$users = mysqli_query($conn, "SELECT * FROM user");
$share_computers = mysqli_query($conn, "SELECT * FROM sharing_computer");

$currentUserId = $_SESSION['user_id'];
$currentUser = mysqli_query($conn, "SELECT name FROM user WHERE id=$currentUserId");
$currentUser_row = mysqli_fetch_assoc($currentUser);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/home.css">
	<link rel="stylesheet" href="assets/css/navbar.css">
	<title>Home | DASHBOARD</title>
</head>
<style>@import url('https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap');</style>
<body>
	<?php
	if (!file_exists($dataFile)) {
		$myfile = fopen($dataFile, "w");
		fclose($myfile);
	}
	include_once("navbar.php");
	?>
	<div class="main-content">
		<div class="categories">
			<a href="index.php" class="category-card cat1"></a>
			<?php
				if (isset($_SESSION['admin']) == true){
					echo '
					<a href="./admin/user_list.php" class="category-card cat2"></a>
					';
				}else{
					echo '
					<a href="#" class="category-card cat3"></a>
					';
				}
			?>
			<a href="inventory_list.php" class="category-card cat4"></a>
		</div>
	</div>
</body>

<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>