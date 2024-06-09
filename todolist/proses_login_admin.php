<?php
session_start();

// Simpan kredensial admin (contoh, bisa disesuaikan dengan basis data)
$admin_username = "adminkelompok2";
$admin_password = "adminkelompok2";

// Ambil data dari formulir login
$user_input = $_POST['username'];
$pass_input = $_POST['password'];

// Validasi login
if ($user_input === $admin_username && $pass_input === $admin_password) {
    // Login berhasil, set session dan redirect ke halaman admin
    $_SESSION['admin_logged_in'] = true;
    header("Location: halaman_admin.php");
    exit();
} else {
    // Login gagal, kembali ke halaman login dengan pesan error
    header("Location: index.php?error=InvalidCredentials");
    exit();
}
?>
