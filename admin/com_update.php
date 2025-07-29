<?php
include("check_auth.php");

include("confs/config.php");
$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE computer SET name='$name', modified_date=now() WHERE id = $id ";
mysqli_query($conn, $sql);
header("location: com_list.php");
 ?>
