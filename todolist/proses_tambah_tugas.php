<?php
// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah sesi sudah dimulai, jika belum, mulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah pengguna sudah login, jika tidak, redirect ke index.php
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Tangkap nilai input dari form
$nama_tugas = $_POST['nama_tugas'];
$deskripsi_tugas = $_POST['deskripsi_tugas'];
$deadline = $_POST['deadline'];

// Tangkap nilai username dari sesi
$username = $_SESSION['username'];

// Masukkan data ke database
$query = "INSERT INTO data_tugas (nama_tugas, deskripsi_tugas, deadline) VALUES ('$nama_tugas', '$deskripsi_tugas', '$deadline')";
$result = mysqli_query($koneksi, $query);

// Periksa apakah data berhasil dimasukkan
if ($result) {
    $_SESSION['username'] = $username;
    // Jika berhasil, arahkan ke tampil_data_tugas.php
    header("Location: tampil_data_tugas.php");
} else {
    // Jika gagal, tampilkan pesan error atau redirect ke halaman error
    echo "Error: " . mysqli_error($koneksi);
    // header("Location: error.php");
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
