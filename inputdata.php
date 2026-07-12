<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'fungction.php';

    if(isset($_POST["submit"])){
        $_FILES['photo']['name'] = $_POST['nama_mhs'] . '_' . $_FILES['photo']['name'];

        if (tambahdata($_POST, $_FILES['photo']) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'mahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'mahasiswa.php';
                </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link rel="stylesheet" href="style/inputdata.css">
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
    <h2>Input Data Mahasiswa</h2>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nama">Nama :</label><br></td>
                <td><input type="text" id="nama_mhs" name="nama_mhs" required></td>
            </tr>
            <tr>
               <td> <label for="Nim">Nim :</label></td>
               <td><input type="number" id="Nim_mhs" name="Nim_mhs" required></td>
            </tr>

            <tr>
                <td><label for="jurusan">jurusan :</label></td>
                <td><input type="text" id="jurusan" name="jurusan" required></td>
            </tr>
            <tr>
                <td><label for="email">email :</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="no_hp">Nomor HP :</label></td>
                <td><input type="text" id="no_hp" name="no_hp" required></td>
            </tr>
            <tr>
                <td><label for="foto">Foto :</label></td>
                <td><input type="file" id="photo" name="photo"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
   </body>
</html>
