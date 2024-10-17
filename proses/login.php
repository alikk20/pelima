<?php

include '../config/connect.php';

$email = $_POST['email'];
$passwd = $_POST['passwd'];

$query9 = "SELECT * FROM user WHERE email='$email' AND passwd='$passwd'";
$result = mysqli_query($is_connect, $query9);

if (mysqli_num_rows($result)> 0){
  session_start();
  $_SESSION['login'] = true;
  $_SESSION['email'] = $email;
  header("Location: ../index.php");
} else {
  header("Location: ../loginn.php");
}