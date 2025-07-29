<?php
include("check_auth.php");
?>

<?php
  include("confs/config.php");
  $id = $_POST['id'];
  $currentUserId = $_SESSION['user_id'];
  $itemName = $_POST['item'];
  $remainQty = $_POST['remain'];
  $addQty = $_POST['add'];
  $total = $remainQty + $addQty;

  $sql = "UPDATE inventory
          SET count='$total', modified_date=now()
          WHERE id = $id ";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO inventory_history(
        user_id,
        inventory_id,
        remark,
        count,
        total_count,
        created_date,
        modified_date) VALUES (
          $currentUserId,
          $id,
          'Take in',
          $addQty,
          $total,
          now(),
          now()
        )";
  mysqli_query($conn, $sql);

  header("location: inventory_list.php");

 ?>
