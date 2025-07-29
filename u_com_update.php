<?php
  include("check_auth.php");

  $GLOBALS['dataFile'] = "data.txt";
  $share_computer_id = $_POST['share_computer_id'];
  $user_id = $_POST['user_id'];
  $startTime = $_POST['startTime'];
  $estimateTime = $_POST['estimateTime'];
  $remark = $_POST['remark'];
  include("admin/confs/config.php");

  $sql = "UPDATE sharing_computer
          SET user_id = '$user_id',
              start_date = '$startTime',
              estimate_time = '$estimateTime',
              remark = '$remark',
              modified_date = now() WHERE id = $share_computer_id";

  mysqli_query($conn, $sql);

  $myfile = fopen($dataFile,"w+");
  fwrite($myfile, "refresh");
  fclose($myfile);


  // =========================================================
  //             for log file
  // =========================================================
  header("location: log.php?share_com_id=$share_computer_id&user_id=$user_id&action=Edit");

 ?>
