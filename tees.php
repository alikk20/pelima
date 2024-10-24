<?php
session_start();

// Periksa apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_ACTIVE) {
    // Sesi aktif, lakukan sesuatu dengan data sesi 
    if (isset($_SESSION['id'])) {
        // Kode untuk mengakses data pengguna
        echo "Selamat datang, " . $_SESSION['nama_lengkap'];
    } else {
        echo "Sesi belum dimulai atau data pengguna tidak ditemukan.";
    }
} else {
    echo "Gagal memulai sesi.";
}
?>