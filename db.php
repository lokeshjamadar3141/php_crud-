<?php

$con = mysqli_connect("localhost","admin","admin","task_db");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>