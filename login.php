<?php
session_start();
require 'fungction.php';

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: mahasiswa.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id_user'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: mahasiswa.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style/index.css">
    <style>
        body { text-align: center; font-family: Arial, sans-serif; }
        .form-container { display: inline-block; text-align: left; margin-top: 50px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .form-container input:not([type="checkbox"]) { display: block; margin-bottom: 10px; padding: 8px; width: 250px; }
        .form-container button { padding: 10px 20px; cursor: pointer; }
        .error { color: red; font-style: italic; }
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
    <h1>Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <p class="error">Username / password salah!</p>
    <?php endif; ?>

    <div class="form-container">
        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>

            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
            <br><br>
            
            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
    </div>
</body>
</html>
