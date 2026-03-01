<?php
    include("database.php");

    function signup($data) {
        global $koneksi;

        $name = ($data["name"]);
        $email = ($data["email"]);

        // cek user name sudah ada atau belum
        // $result = mysqli_query($koneksi, "SELECT email FROM users
        //     WHERE email = '$email'");

        // if(mysqli_fetch_assoc($result)) {
        //     echo "<script>
        //             alert('email already registered!')
        //         </script>";
        //     return false;
        // }

        $phone = ($data["phone"]);
        $password = ($data["password"]);

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($koneksi, "INSERT INTO users VALUES(
        '', '$name', '$email', '$phone', '$password', '' )");

        return mysqli_affected_rows($koneksi);
    }
?>
