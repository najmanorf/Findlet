<?php
require_once "../../query/delete-report.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    deleteReport($id);
} else {
    echo "ID tidak ditemukan.";
}
?>
