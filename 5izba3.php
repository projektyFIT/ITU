<?php

require_once("configuration.php");

$meno=$_POST['meno'];
$priezvisko=$_POST['priezvisko'];
$email=$_POST['email'];
$mobil=$_POST['mobil'];
$od=$_POST['od'];
$do=$_POST['do'];
$pozn=$_POST['Pozn'];
$pocetOsob=$_POST['osob'];
$typizby=$_POST['variable'];



$con=mysqli_connect(CONNECTION,USER,PASSWD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$pom='';


$result = mysqli_query($con,"SELECT * FROM pom");

while($row = mysqli_fetch_array($result))
  {
  $pom= $row['izba'] ;
  break;
  }

$sql="INSERT INTO objednavka (meno, priezvisko, email,mobil,od,do,pocetosob,poznamka,typizby)
VALUES
('$meno','$priezvisko','$email','$mobil','$od','$do','$pocetOsob','$pozn','$pom')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

  mysqli_close($con);
  
  $to      = $email;
$subject = 'Objednavka';
$message = 'Dobrý deň,\r\n Ďakujeme za Vašu objednávku.';
$headers = 'From: info@privatosada.sk' . "\r\n" .
    'Reply-To: info@privatosada.sk' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

  $to      = 'info@privatosada.sk';
$subject = 'Objednavka';
$message = 'Objednávka:\r\n Od:$od\r\n Do:$do\r\n Meno:$meno\r\n,Priezvisko:$priezvisko\r\n Izba:$typizby\r\n Email:$email\r\n,Mobil:$mobil\r\n';
$headers = 'From: info@privatosada.sk' . "\r\n" .
    'Reply-To: info@privatosada.sk' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);


header("HTTP/1.1 301 Moved Permanently");
header("Location: index.html");
header("Connection: close");




?>