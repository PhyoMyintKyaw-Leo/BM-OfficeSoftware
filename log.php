<?php
// include("check_auth.php");
// =================================== //
include("admin/confs/config.php");
$share_com_id = $_GET['share_com_id'];
$user_id = $_GET['user_id'];
$action = $_GET['action'];
$access_com_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$share_computer = mysqli_query($conn, "SELECT * FROM sharing_computer WHERE id = $share_com_id");
$share_computer_row = mysqli_fetch_assoc($share_computer);

//get computer row
$com_id = $share_computer_row['com_id'];
$com = mysqli_query($conn, "SELECT name FROM computer WHERE id = $com_id");
$com_row = mysqli_fetch_assoc($com);
//get user row
$user = mysqli_query($conn, "SELECT name FROM user WHERE id=$user_id");
$user_row = mysqli_fetch_assoc($user);

//get info
$computerName = $com_row['name'];
$userName = $user_row['name'];
$startTime = $share_computer_row['start_date'];
$estimateTime = $share_computer_row['estimate_time'];
$remark = $share_computer_row['remark'];
// $modified_date = date("Y-M-d");
// $modified_time = date("H:i:s");
$modified_date = date("Y, F j, g:i:s a");

// $timezone = date_default_timezone_get();

//format log row
$row = "=====================================".PHP_EOL;
$row .= $computerName." を ";
$row .= $userName." が ";
$row .= $modified_date." に ";
$row .= $access_com_name." から ";
$row .= $action." しました。".PHP_EOL;
if ($action == "Edit") {
	$row .= "start date   :".$startTime.PHP_EOL;
	$row .= "estimate time:".$estimateTime.PHP_EOL;
	$row .= "remark       :".$remark.PHP_EOL;
}
$row .= "-------------------------------------".PHP_EOL;

//dir create if dir not exit
$log_foldername = "log";
if (!file_exists($log_foldername)){
		mkdir($log_foldername, 0777, true);
}

file_put_contents($log_foldername.'/'.date("Y-m-d").'.log', $row, FILE_APPEND);

header("location: index.php");



 ?>
