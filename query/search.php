<?php
include("database.php");

function search($id_number) {
    global $koneksi;
    
    // Biar aman, kita escape input dari user
    $id_number = mysqli_real_escape_string($koneksi, $id_number);

    $query = "SELECT * FROM wallet_reports WHERE id_number = '$id_number'";
    $result = mysqli_query($koneksi, $query);

    // Ambil 1 baris hasil pencarian (kalau ada)
    return mysqli_fetch_assoc($result);
}
?>
