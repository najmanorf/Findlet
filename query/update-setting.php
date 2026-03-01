<?php
include("database.php");

function updateUser($id, $name, $email, $phone) {
    global $koneksi;
    $query = "UPDATE users SET 
                name = '$name', 
                email = '$email', 
                phone = '$phone' 
              WHERE id = $id";
    return mysqli_query($koneksi, $query);
}
?>
