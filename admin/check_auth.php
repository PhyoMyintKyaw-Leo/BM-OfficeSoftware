<?php
	session_start();
	$auth = isset($_SESSION['auth']);
	if ($auth === false) {
		header("location: ../login.php");
		exit;
	}

	$admin = isset($_SESSION['admin']);
	if ($admin === false) {
		header("location: ../login.php");
		exit;
	}

 ?>
