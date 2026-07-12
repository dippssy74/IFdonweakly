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

    function tambahdata($data, $photo){
        global $conn;

        $nama = htmlspecialchars($data["nama_mhs"]);
        $Nim = htmlspecialchars($data["Nim_mhs"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $photoname = $photo['name'];
        $tmp_name = $photo['tmp_name'];

        $upload_dir = 'aset/'.$photoname;

        if (move_uploaded_file($tmp_name, $upload_dir)) {
            // File uploaded successfully
            $query = "INSERT INTO mahasiswa (nama_mhs, Nim_mhs, jurusan, email, no_hp, photo)
            VALUES ('$nama', '$Nim', '$jurusan', '$email', '$no_hp', '$photoname')";

            mysqli_query($conn, $query);
        }

        return mysqli_affected_rows($conn);
    }

    function hapusdata($id){
        global $conn;

        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mhs = $id");

        return mysqli_affected_rows($conn);
    }

    function editdata($data, $photo, $id){
        global $conn;

        $nama = htmlspecialchars($data["nama_mhs"]);
        $Nim = htmlspecialchars($data["Nim_mhs"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $photoname = $photo['name'];
        $tmp_name = $photo['tmp_name'];

        $upload_dir = 'aset/'.$photoname;

        if (move_uploaded_file($tmp_name, $upload_dir)) {
            // File uploaded successfully

        $query = "UPDATE mahasiswa SET
                    nama_mhs = '$nama',
                    Nim_mhs = '$Nim',
                    jurusan = '$jurusan',
                    email = '$email',
                    no_hp = '$no_hp',
                    photo = '$photoname'
                  WHERE id_mhs = $id";

        mysqli_query($conn, $query);
        }

        return mysqli_affected_rows($conn);
    }

    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $konfirmasi = mysqli_real_escape_string($conn, $data["konfirmasi"]);

        // cek konfirmasi password
        if($password !== $konfirmasi) {
            echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                  </script>";
            return false;
        }

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username sudah terdaftar!');
                  </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

        return mysqli_affected_rows($conn);
    }

?>
