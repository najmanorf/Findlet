<?php
session_start();
require_once "../../query/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Gunakan prepared statement dengan mysqli
    $stmt = $koneksi->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        // Login sukses, simpan session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        header("Location: approval-claim.php");
        exit();
    } else {
        // Login gagal
        echo "<script>alert('Username atau password salah!');window.location.href='signin-ad.php';</script>";
    }
}
?>
