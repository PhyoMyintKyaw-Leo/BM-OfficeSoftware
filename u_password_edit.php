<?php
include("</admin/confs/config.php");
session_start();
$user_name = $_SESSION['user_name'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE name='$user_name'");
$row = mysqli_fetch_assoc($result);
$old_password_db = $row['password'];
?>
<?php
$invalidLogin = false; // Flag to track invalid login attempts
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$old_password = $_POST['old_password'];
	if (password_verify($old_password, $old_password_db)) {
		// Check if the password is set and not empty
		if (isset($_POST['password']) && !empty($_POST['password'])) {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}
		// Build the query
		$sql = "UPDATE user SET modified_date=now()";
		if (!empty($password)) {
			$sql .= ", password='$password'";
		}
		$sql .= " WHERE name='$user_name'";
		// Execute the query
		mysqli_query($conn, $sql);
		$invalidLogin = false;
	} else {
		$invalidLogin = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Change Password</title>

</head>
<body>
	<div class="login-container">
		<form class="login-form" action="" method="POST">
			<div>
				<img src="./img/Logo.jpg" class="img">
			</div>
			<h2>Change Password</h2>
			<label for="inputName">Name</label>
			<div class="form-group">
				<input type="hidden" name="name" value="<?php echo  $user_name ?>">
				<input type="text" class="form-control" id="inputName" value="<?php echo $user_name?>" disabled />
			</div>
			<br>

			<label for="inputPassword">Current Password</label>
			<div class="form-group">
				<input type="password" class="form-control" id="inputPassword" name="old_password" maxlength="50" required />
			</div>
			<p style="color: red; display: <?php echo $invalidLogin ? 'block' : 'none'; ?>">
				Your current password is incorrect. Please try again.
			</p>
			<br>

			<label for="inputPassword">Update Password</label>
			<div class="form-group">
				<input type="password" class="form-control" id="inputPassword" name="password" maxlength="50" required />
			</div>

			<div class="password-btn">
				<button type="submit" name="submit">Update</button>
				<a class="back-btn" href="home.php">Back</a>
			</div>

			<?php
				if(isset($_POST['submit'])){
					if($invalidLogin == false){
						echo "<script>
								alert('Your password is successfully changed!');
								window.location.href = 'home.php';
							  </script>";
					}
				}
			?>
		</form>
	</div>
</body>
<footer>
	<div>Being Collabration &copy; All RIGHTS RESERVED</div>
</footer>
</html>