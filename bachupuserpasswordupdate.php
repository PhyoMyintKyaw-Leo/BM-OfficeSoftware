<?php
session_start();
include("admin/confs/config.php");
// $result = mysqli_query($conn, "SELECT * FROM user ORDER BY name ASC");
// $row = mysqli_fetch_assoc($result);
$name = $_POST['name'];
$password = '';
$old_password = $_POST['old_password'];
$old_password_db = mysqli_query($conn, "SELECT password FROM user WHERE name='aa'");
$old_password_db2 = mysqli_fetch_assoc($old_password_db);

if (password_verify($old_password, $old_password_db2['password'])) {
	// Check if the password is set and not empty
	if (isset($_POST['password']) && !empty($_POST['password'])) {
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	}

		//Build the query
		
		$sql = "UPDATE user SET password='$password' WHERE name=$name";
		if (!empty($password)) {
			$sql .= ", password='$password'";
		}http://localhost/sanyopc/u_password_edit.php
		$sql .= " WHERE name=$name";
		$sql = "UPDATE user SET modified_date=now()";
		

	// Execute the query
		mysqli_query($conn, $sql);
		$alertMessage = 'Change password successful!';
		// header("Location: index.php?alert=" . urlencode($alertMessage));
} else {
		$alertMessage = 'Invalid old password!';
		// header("Location:  u_password_edit.php?alert=" . urlencode($alertMessage));
}
?>
<input type="button" value="<?php echo $old_password_db2['password']; ?>">
<input type="button" value="<?php echo $name ?>">
<input type="button" value="<?php echo var_dump($name) ?>">