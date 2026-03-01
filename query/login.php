<?php
session_start();
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = strtolower(trim($_POST["email"]));
    $password = $_POST["password"];

    // Gunakan placeholder ? untuk mysqli
    $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // "s" = string
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    if ($user && password_verify($password, $user['password'])) {
        // Login sukses, simpan session
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_email'] = $user['email'];
        header("Location: ../index.php");
        exit();
    } else {
        // Login gagal
        echo "<script>alert('email atau password salah!');window.location.href='../pages/signin.php';</script>";
    }
}
?>
