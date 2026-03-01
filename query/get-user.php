<?php
function getUserById($id) {
    require_once "database.php";

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($result);
    return $user;
}
?>

