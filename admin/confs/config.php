<?php
  define('DEFAULT_PASSWORD', 123);

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "sanyopc";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  mysqli_select_db($conn, $dbname);
 ?>
