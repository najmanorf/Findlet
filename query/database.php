<?php
$koneksi = mysqli_connect("localhost", "root", "", "findlet");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
} else {
    echo "";
}
?>
