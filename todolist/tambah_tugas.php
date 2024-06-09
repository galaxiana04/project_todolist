<?php
// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah sesi sudah dimulai, jika belum, mulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah pengguna sudah login, jika tidak, redirect ke proses_login.php
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Tangkap nilai username dari sesi
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="styleb.css">
</head>
<body>
    <div class="wrapper1">
        <h1>Selamat Datang, <?php echo $username; ?>!</h1>
        <h2>List Tugas</h2>
        <div class="wrapper2">
            <form action="proses_tambah_tugas.php" method="post">
                    <h3>Tambah Tugas</h3>
                    <div class="wrapper3">
                        <label>Nama Tugas:</label>
                        <div class="input-box">
                            <input type="text" name="nama_tugas" required>
                        </div>
                        <label>Deskripsi Tugas:</label>
                        <div class="input-box">
                            <textarea name="deskripsi_tugas" id="" cols="30" rows="5"></textarea>
                        </div>
                        <label>Deadline:</label>
                        <div class="input-box">
                            <input type="date" name="deadline" required>
                    </div>
                    <button type="submit" class="btn">Tambah Tugas</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
