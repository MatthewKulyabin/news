<?php
  $host='localhost';
  $database='check_work_4';
  $user='root';
  $password='root';

  $GLOBALS['mysqli'] = mysqli_connect($host, $user, $password, $database);
  if (mysqli_connect_errno($GLOBALS['mysqli'])) {
    echo "Couldn't connect to MySQL: ".mysqli_connect_error($mysqli);
  }
?>
