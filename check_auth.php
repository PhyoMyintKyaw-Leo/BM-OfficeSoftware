<?php
	session_start();
	$auth = isset($_SESSION['auth']);
	if ($auth === false) {
		header("location: login.php");
		exit;
	}
 ?>
