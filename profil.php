<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style/profile.css">
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
    <h1>profile</h1>
    <hr>
    <p>Hai, nama saya Doni. Saya adalah ceo paling ganteng sejagat raya.</p>
    <p>Hobi saya adalah makan mie ayam, tidur, dan bermain game. Saya juga suka berolahraga seperti sepak bola dan basket.</p>
    <p>Saya memiliki pengalaman bekerja di beberapa perusahaan teknologi besar, dan saya sangat bersemangat dalam menghadapi tantangan baru.</p>
</body>
</html>
