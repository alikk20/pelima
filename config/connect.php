<?php

$username = "admin";
$password = "gundul";
$host = "localhost";

$is_connect = mysqli_connect($host, $username, $password);

if($is_connect){
   mysqli_select_db($is_connect, "pelima");
}else{
    echo "raiso";
}
