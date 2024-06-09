<?php
// Sertakan file koneksi
include 'koneksi.php';

// Mulai sesi
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query ke database untuk mencocokkan username dan password
    $sql = "SELECT * FROM data_user WHERE username='$username'";
    $result = $koneksi->query($sql);

    // Periksa hasil query
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if ($password === $row['password']) {
            // Jika password benar, set session 'username'
            $_SESSION['username'] = $username;
            // Redirect ke tambah_list.php
            header("Location: tambah_tugas.php");
            exit();
        } else {
            // Jika password salah
            echo "Login gagal. Periksa kembali username dan password Anda.";
        }
    } else {
        // Jika data tidak ditemukan, berarti login gagal
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
}

// Tutup koneksi database
$koneksi->close();
?>
