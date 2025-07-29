<?php
include("check_auth.php");
include("confs/config.php");

$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

// TODO:ユーザーを削除したら、そのユーザーが使っているPCがあるかをチェックし、
// あったら、sharing_computerにあるuser_idを 0 に設定し、他の情報も削除する
$sql = "DELETE FROM user WHERE id = $id";

mysqli_query($conn, $sql);

//自分自身で削除したら Login Form へ行く
if ($id == $_SESSION['user_id']) {
	header("location: ../logout.php");
		exit;
}
header("location: user_list.php");
?>
