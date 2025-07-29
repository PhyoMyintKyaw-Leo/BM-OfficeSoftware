<?php
include("check_auth.php");
// =================================== //
 ?>

<?php
	include("admin/confs/config.php");
	$inventory_id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$itemName = $_POST['item'];
	$remainQty = $_POST['remain'];
	$outQty = $_POST['out'];
	$total_left = $remainQty - $outQty;

	$sql = "UPDATE inventory SET count='$total_left', modified_date=now() WHERE id = $inventory_id ";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO inventory_history(
					user_id,
					inventory_id,
					remark,
					count,
					total_count,
					created_date,
					modified_date) VALUES (
					$user_id,
					$inventory_id,
					'Take Out',
					$outQty,
					$total_left,
					now(),
					now()
				)";
	mysqli_query($conn, $sql);

	echo "<script>
    		alert('Take out successful!');
    		window.location.href = 'inventory_list.php';
		  </script>";
 ?>
