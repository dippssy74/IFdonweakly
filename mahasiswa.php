<?php
    require 'fungction.php';

    $qmahasiswa = "SELECT * FROM mahasiswa";

    $datamahasiswa = tampildata($qmahasiswa); //menghasilkan data dalam bentuk array

    //mysqli_fetch_row
    //mysqli_fetch_assoc
    //mysqli_fetch_object
    //mysqli_fetch_array

    // $getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style/mahasiswa.css">
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
    <h1>Data Mahasigma</h1>
    <hr>
    <h3>Data Mahasiswa </h3>

    <a href="inputdata.php">
        <button>Tambah Data</button>
    </a>

    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >nim</th>
            <th >jurusan</th>
            <th >email</th>
            <th >nomer hp</th>
            <th >foto</th>
            <th >aksi</th>
        </tr>
<?php
$no = 1;
foreach ($datamahasiswa as $mhs){

?>
        <tr>
            <td>
                <?php echo $no++; ?>
            </td>
            <td><?php echo $mhs["nama_mhs"] ?></td>
            <td><?php echo $mhs["Nim_mhs"] ?></td>
            <td><?php echo $mhs["jurusan"] ?></td>
            <td><?php echo $mhs["email"] ?></td>
            <td><?= $mhs["no_hp"] ?></td>
            <td><img src="aset/<?= $mhs["photo"] ?>" width="100"></td>
            <td>
                <a href="editdata.php?id=<?=$mhs["id_mhs"] ?>">Edit</a>
                <a href="hapusdata.php?id=<?=$mhs["id_mhs"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
<?php
    }
?>

    </table>


    <!-- <hr>
        <h2> latihan soal</h2>
       <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>1, 1</td>
            <td>1, 2</td>
            <td>1, 3</td>
            <td>1, 4</td>
        </tr>
        <tr>
            <td>2, 1</td>
            <td>baris 2, 3 <br> kolom 2, 3</td>
            <td>2, 4</td>
        </tr>
        <tr>
            <td>3, 2</td>
            <td>3, 3</td>
        </tr>
        <tr>
            <td>4, 1</td>
            <td>4, 2</td>
            <td>4, 3</td>
            <td>4, 4</td>
        </tr>
    </table>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td colspan="4">baris 1 kolom 1, 2</td>
        </tr>
        <tr>
            <td >baris 2 kolom 1</td>
            <td>baris 2 kolom 2</td>
            <td >baris 2 kolom 3</td>
        </tr>
        <tr>
            <td>baris 3 kolom 2</td>
        </tr>
        <tr>
            <td colspan="4">baris 4 kolom 1</td>
        </tr>
    </table> -->

    <!-- <table border="1" cellpadding="10">
        <tr>
            <td >baris 1 kolom 1, 2</td>
            <td>baris 1 kolom 2</td>
        </tr>
        <tr>
            <td>baris 2 kolom 1</td>
            <td >baris 2,3 kolom 2</td>
            <td>baris 2 kolom 3</td>
        </tr>
        <tr>
            <td>baris 3 kolom 2</td>
            <td>baris 3 kolom 3</td>
        </tr>
    </table> -->

</body>
</html>
