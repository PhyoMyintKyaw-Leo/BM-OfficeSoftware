<?php
include("check_auth.php");

include("confs/config.php");

$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

if($id !== null){
	$sql = "DELETE FROM computer WHERE id = $id";
	mysqli_query($conn, $sql);
	header("location: com_list.php");
}
 ?>
