<?php
	include("check_auth.php");

	$GLOBALS['dataFile'] = "data.txt";
	include("admin/confs/config.php");

	//削除するまえ、データを取る
	$id = $_POST['id'];
	$share_computer = mysqli_query($conn, "SELECT user_id FROM sharing_computer WHERE id=$id");
	$share_computer_row = mysqli_fetch_assoc($share_computer);
	$user_id = $share_computer_row['user_id'];

	//user がなかったら、update しない。log を書かない
	if ($user_id <= 0) {
		header("location: index.php");
		exit;
	}

	$sql = "UPDATE sharing_computer
			SET user_id = '0',
			start_date = '',
			estimate_time = '',
			remark = '',
			modified_date = now(),
			row_count = 0,
			login_user = 0
			WHERE id = $id";

	mysqli_query($conn, $sql);

	$myfile = fopen($dataFile,"w+");
	fwrite($myfile, "refresh");
	fclose($myfile);

	// =========================================================
	//             for log file
	// =========================================================
	header("location: log.php?share_com_id=$id&user_id=$user_id&action=Clear");

 ?>
