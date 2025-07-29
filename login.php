<?php
session_start();
if (isset($_SESSION['user_name'])) {
	session_unset();
	session_destroy();
	setcookie(session_name(), '', time() - 3600, '/');
}
$login_fail = isset($_SESSION['login_fail']);
include("admin/confs/config.php");

$users = mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Log In</title>

</head>
<body>
	<div class="login-container">
		<form class="login-form" action="auth.php" method="POST">
			<div>
				<img src="./img/Logo.jpg" class="img">
			</div>
			<h2>User Login</h2>
			<div class="form-group">
				<select id="userName" name="user_id">
					<option value="0">-- Choose User --</option>
						<?php
							while ($user_row = mysqli_fetch_assoc($users)) { ?>
							<option value="<?php echo $user_row['id'] ?>"><?php echo $user_row['name'] ?></option>
						<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<input type="password" name="password" required placeholder="Enter your password">
			</div>

			<?php
			if ($login_fail) {
				unset($_SESSION['login_fail']);
				echo "<div class='alert alert-primary alert-dismissible fade show message' style='text-align:center;'>";
				echo "<strong>Password is incorrect! Please try again.</strong>";
				echo "</div>";
			}
			?>

			<div class="login-btn"><button type="submit" name="submit">Sign In</button></div>
		</form>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>