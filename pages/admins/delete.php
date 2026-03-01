<?php
require_once "../../query/delete.php"; // fungsi delete
// delete.php di sini sudah include database.php di dalamnya

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    delete($id);
} else {
    echo "ID tidak ditemukan.";
}
?>