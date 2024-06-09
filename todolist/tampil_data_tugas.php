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

// Ambil data tugas dari database
$query = "SELECT * FROM data_tugas";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Tugas</title>
    <link rel="stylesheet" href="stylec.css">
</head>
<body>
    <div class="wrapper1">
        <h1>Tugas <?php echo $username; ?> saat ini:</h1>
        <div class="wrapper2">
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tugas</th>
                        <th>Deskripsi Tugas</th>
                        <th>Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['nama_tugas'] . "</td>";
                        echo "<td>" . $row['deskripsi_tugas'] . "</td>";
                        echo "<td>" . $row['deadline'] . "</td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="tambah_tugas.php">Tambah tugas</a>
    </div>
</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
