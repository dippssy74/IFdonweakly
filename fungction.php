<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "ifdonweekly";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function tampildata($query){
        $result = mysqli_query($GLOBALS['conn'], $query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahdata($data){
        global $conn;

        $nama = htmlspecialchars($data["nama_mhs"]);
        $Nim = htmlspecialchars($data["Nim_mhs"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $photo = $data["photo"];

        $query = "INSERT INTO mahasiswa (nama_mhs, Nim_mhs, jurusan, email, no_hp, photo)
        VALUES ('$nama', '$Nim', '$jurusan', '$email', '$no_hp', '$photo')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


?>
