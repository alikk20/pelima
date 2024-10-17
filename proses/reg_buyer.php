<?php
include '../config/connect.php';

$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$passwd = $_POST['passwd'];
$cpasswd = $_POST['cpasswd']; 
$tipe_user = 1;

if (!$is_connect) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}

if ($passwd == $cpasswd) { 

    $query = "INSERT INTO user ( nama_lengkap, asal_sekolah, nisn, email, no_telp, alamat, passwd, tipe_user) 
              VALUES ('$nama_lengkap', NULL, NULL, '$email', '$no_hp','$alamat' ,'$passwd', '$tipe_user');";

    $result = mysqli_query($is_connect, $query);

    if ($result) {
        header("Location: ../");
        exit();
    } else {
        echo 'Gagal menyimpan data: ' . mysqli_error($is_connect);
    }
} else {
  
    echo '<script language="javascript">';
    echo 'alert("Password Tidak Cocok!!");';
    echo 'window.location = "../buyer2.php";';
    echo '</script>';
    exit();
}
?>
