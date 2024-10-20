<?php
include '../config/connect.php';

$nama_lengkap = $_POST['fullName'];
$sekolah = $_POST['school'];
$nisn = $_POST['nisn'];
$no_hp = $_POST['nohp'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];  
$alamat = $_POST['alamat'];
$tipe_user =  2;

if (!$is_connect) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}

if ($password == $cpassword) { 

    $query_check_email = "SELECT * FROM user WHERE email = '$email'";
    $result_check_email = mysqli_query($is_connect, $query_check_email);

    if (mysqli_num_rows($result_check_email) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Email sudah terdaftar!");';
        echo 'window.location = "../buyer2.php";'; // Ganti dengan halaman yang sesuai
        echo '</script>';
        exit();
    }

    
    // if (mysqli_num_rows($result_check_email) > 0) {

    //   $quoeq = "UPDATE user SET 
    //                  nama_lengkap = '$nama_lengkap',
    //                  asal_sekolah = '$sekolah',
    //                  nisn = '$nisn',
    //                  no_telp = '$no_hp',
    //                  passwd = '$password', 
    //                  tipe_user = '$tipe_user' 
    //                  WHERE email = '$email'";
    //   $data = mysqli_query($is_connect, $quoeq);

    //   if ($result) {
    //     header("Location:../role.html");
    //     exit();
    // } else {
    //     echo 'Gagal menyimpan data: ' . mysqli_error($is_connect);
    // }
    //   exit();
    // }

    $query = "INSERT INTO user ( nama_lengkap, asal_sekolah, nisn, email, no_telp, alamat, passwd, tipe_user) 
              VALUES ('$nama_lengkap', '$sekolah', '$nisn', '$email', '$no_hp', '$alamat','$password', '$tipe_user')";

    $result = mysqli_query($is_connect, $query);

    if ($result) {
        header("Location:../role.php");
        exit();
    } else {
        echo 'Gagal menyimpan data: ' . mysqli_error($is_connect);
    }
} else {
  
    echo 'Password dan Konfirmasi Password tidak cocok!';
}
?>
