<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="stylea.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="proses_login.php" method="post">
            <h1>Lupa Password</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <button type="submit" class="btn">Kirim</button>
            <div class="register-link">
                <p>Belum punya akun? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>