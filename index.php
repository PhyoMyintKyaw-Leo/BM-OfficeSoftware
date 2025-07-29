<?php
include("check_auth.php");
$GLOBALS['dataFile'] = "data.txt";
include("admin/confs/config.php");

$computers = mysqli_query($conn, "SELECT * FROM computer");
$users = mysqli_query($conn, "SELECT * FROM user");
$share_computers = mysqli_query($conn, "SELECT * FROM sharing_computer");
$u_com_row = mysqli_fetch_assoc($share_computers);
$com_id = $u_com_row['com_id'];

$currentUserId = $_SESSION['user_id'];
$currentUser = mysqli_query($conn, "SELECT name FROM user WHERE id=$currentUserId");
$currentUser_row = mysqli_fetch_assoc($currentUser);

//updating share_computers db
while ($u_com_row = mysqli_fetch_assoc($share_computers)) {
	$com_id = $u_com_row['com_id'];
	$sanyo_com = mysqli_query($conn, "SELECT * FROM computer WHERE id = $com_id");
	$sanyo_com_row = mysqli_fetch_assoc($sanyo_com);
	if ($sanyo_com_row === null) {
		$u_com_id = $u_com_row['id'];
		$sql = "DELETE FROM sharing_computer WHERE id = $u_com_id";
		mysqli_query($conn, $sql);
	}
}

$share_computers = mysqli_query($conn, "SELECT sharing_computer.*, computer.name
										FROM sharing_computer LEFT JOIN computer
										ON sharing_computer.com_id = computer.id
										ORDER BY computer.name ASC");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/navbar.css">
	<link rel="stylesheet" href="assets/css/index.css">
	<title>Senyo PC List | DASHBOARD</title>
</head>
<body>
	<?php
	if (!file_exists($dataFile)) {
		$myfile = fopen($dataFile, "w");
		fclose($myfile);
	}
	include_once("navbar.php");
	?>
<div class="com-main-content">
	<table class="computer-list-table">
		<thead>
			<tr>
				<th>No</th>
				<th>Senyo PC</th>
				<th>Current User</th>
				<th>Starting Data&Time</th>
				<th>Estimate Time</th>
				<th>Remark</th>
				<th>Edit</th>
				<th>Clear</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = 0;
				while ($share_com_row = mysqli_fetch_assoc($share_computers)) {

					$com_id = $share_com_row['com_id'];
					$user_id = $share_com_row['user_id'];
					$row_permission = $share_com_row['row_count'];
					$users = mysqli_query($conn, "SELECT id, name FROM user WHERE id = $user_id");
					$user_row = mysqli_fetch_assoc($users);
					$count = $count + 1;
			?>
				<tr
					<?php if ($user_row <> null) {
								echo " style = 'background-color:rgba(114, 119, 119, 1);'; ";
							} else {
								echo "";
							}
					?>
				>
					<td><?php echo $count ?></td>
					<td><?php echo $share_com_row['name'] ?></td>
					<td><?php echo (isset($user_row) && isset($user_row['name'])) ? $user_row['name'] : ''; ?></td>
					<td><?php echo $share_com_row['start_date'] ?></td>
					<td><?php echo $share_com_row['estimate_time'] ?></td>
					<td><?php echo $share_com_row['remark'] ?></td>
					<td>
						<div class="form-group">
							<form action="u_com_edit.php" method="post">
								<input type="hidden" name="count" value="<?php echo $count ?>">
								<input type="hidden" name="share_com_id" value="<?php echo $share_com_row['id'] ?>">
								<input type="hidden" name="com_id" value="<?php echo $share_com_row['com_id'] ?>">
								<input type="hidden" name="user_id" value="<?php echo (isset($user_row) && isset($user_row['id'])) ? $user_row['id'] : ''; ?>">
								<input type="hidden" name="s_time" value="<?php echo $share_com_row['start_date'] ?>">
								<input type="hidden" name="e_time" value="<?php echo $share_com_row['estimate_time'] ?>">
								<input type="hidden" name="remark" value="<?php echo $share_com_row['remark'] ?>">
								<input class="take-out-btn"
								<?php
									if (($share_com_row['user_id'] > 0) and ($user_id <> $_SESSION['user_id']))
									echo "disabled style='cursor:not-allowed'";
								?>
								type="submit" name="submit" value="Edit">
							</form>
						</div>
					</td>
					<td>
						<div class="form-group">
							<form action="u_com_clear.php" method="post">
								<input type="hidden" name="id" value="<?php echo $share_com_row['id'] ?>">
								<input class="history-btn"
									<?php
										if(($share_com_row['user_id'] > 0) and ($user_id <> $_SESSION['user_id']))
										echo "disabled style='cursor:not-allowed'";
									?>
								type="submit" name="submit" value="Clear">
							</form>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="add-com-btn">
		<?php
			if (isset($_SESSION['admin']) == true){
				echo '<a href="u_com_new.php">Add new senyo computer to Dashboard</a>';
			}
		?>
	</div>
</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>