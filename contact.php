<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style/contact.css">
</head>
<body>
    <nav>
        <ul>
            <ul><a href="index.php">Home</a></ul>
            <ul><a href="profil.php">Profil</a></ul>
            <ul><a href="contact.php">Contact</a></ul>
            <ul><a href="mahasiswa.php">Data</a></ul>
            <?php if(isset($_SESSION["login"])) : ?>
                <ul><a href="logout.php">Logout</a></ul>
            <?php else : ?>
                <ul><a href="login.php">Login</a></ul>
            <?php endif; ?>
        </ul>
    </nav>
    <h1>Contact</h1>
    <hr>
    <a href="http://wa.me/+6282136377167">WhatsApp</a><br>
    <a href="https://www.instagram.com/abil_anggara_/">Instagram</a><br>
    <a href="index.php">Home</a><br>
    <a href="profil.php">Profil</a><br>
</body>
</html>
