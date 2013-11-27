<?php

require_once("configuration.php");


$typizby=$_POST['variable'];



$con=mysqli_connect(CONNECTION,USER,PASSWD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$sql="INSERT INTO pom (izba)
VALUES
('$typizby')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

   mysqli_close($con);




?>