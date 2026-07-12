<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'fungction.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style/index.css">
    <style>
        body { text-align: center; font-family: Arial, sans-serif; }
        .form-container { display: inline-block; text-align: left; margin-top: 50px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .form-container input { display: block; margin-bottom: 10px; padding: 8px; width: 250px; }
        .form-container button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>
    <nav>
        <ul>
            <ul><a href="index.php">Home</a></ul>
            <ul><a href="profil.php">Profil</a></ul>
            <ul><a href="contact.php">Contact</a></ul>
            <ul><a href="mahasiswa.php">Data</a></ul>
        </ul>
    </nav>
    <h1>Halaman Registrasi</h1>
    <div class="form-container">
        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>

            <label for="konfirmasi">Konfirmasi Password :</label>
            <input type="password" name="konfirmasi" id="konfirmasi" required>
            
            <button type="submit" name="register">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
