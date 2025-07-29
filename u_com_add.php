<?php
  include("check_auth.php");
// =================================== //
  $computer_id = $_POST['computer_id'];
  include("admin/confs/config.php");

  $sql = "INSERT INTO sharing_computer(
    com_id,
    created_date,
    modified_date) VALUES (
      $computer_id,
      now(),
      now()
    )";
  mysqli_query($conn, $sql);
  header("location: index.php");
 ?>
