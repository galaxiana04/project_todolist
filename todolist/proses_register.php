<?php
// Sertakan file koneksi
include 'koneksi.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query untuk menyimpan data ke database
    $sql = "INSERT INTO data_user (email, username, password) VALUES ('$email', '$username', '$password')";

    if ($koneksi->query($sql) === TRUE) {
        // Set session 'username' setelah registrasi berhasil
        $_SESSION['username'] = $username;
        // Redirect ke task_list.php setelah pendaftaran berhasil
        header("Location: tambah_tugas.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Tutup koneksi database
$koneksi->close();
?>
