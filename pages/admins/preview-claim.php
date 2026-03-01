<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../../query/database.php";

// Jika tombol Approve diklik
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_id'])) {
    $id = (int) $_POST['approve_id'];
    $update = "UPDATE wallet_claims SET status = 'Approved' WHERE id = $id";
    mysqli_query($koneksi, $update);
    header("Location: approval-claim.php?msg=approved");
    exit;
}

// Jika tombol Reject diklik
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reject_id'])) {
    $id = (int) $_POST['reject_id'];
    $update = "UPDATE wallet_claims SET status = 'Rejected' WHERE id = $id";
    mysqli_query($koneksi, $update);
    header("Location: approval-claim.php?msg=rejected");
    exit;
}

// Ambil ID dari parameter URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    echo "ID tidak valid.";
    exit;
}

// Ambil data klaim
$query = "SELECT * FROM wallet_claims WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$claim = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Claim Preview</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fefcee;
      font-family: system-ui, sans-serif;
    }
    .popup-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0,0,0,0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 999;
    }
    .popup-box {
      background-color: #ffffff;
      border: 2px solid #3d4f2d;
      border-radius: 10px;
      padding: 30px;
      width: 90%;
      max-width: 550px;
      text-align: center;
      position: relative;
    }
    .popup-box h5 {
      color: #1c2f16;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .popup-box .data {
      font-size: 16px;
      text-align: left;
    }
    .popup-box .data div {
      margin-bottom: 10px;
    }
    .claim-btns {
      margin-top: 25px;
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    .btn-primary {
      background-color: #4e7734;
      border-color: #4e7734;
    }
    .btn-primary:hover {
      background-color: #3a5d27;
    }
  </style>
</head>
<body>

<div class="popup-overlay" onclick="closePopup(event)">
  <div class="popup-box" onclick="event.stopPropagation()">
    <h5>Preview Your Claim</h5>
    <div class="data">
      <div><b>ID Number:</b> <?= htmlspecialchars($claim['id_number']) ?></div>
      <div><b>Name:</b> <?= htmlspecialchars($claim['name_on_id']) ?></div>
      <div><b>Gender:</b> <?= htmlspecialchars($claim['gender']) ?></div>
      <div><b>Address:</b> <?= htmlspecialchars($claim['address']) ?></div>
      <div><b>Birth Place:</b> <?= htmlspecialchars($claim['birth_place']) ?></div>
      <div><b>Birth Date:</b> <?= htmlspecialchars($claim['birth_date']) ?></div>
      <div><b>Chronology:</b> <?= htmlspecialchars($claim['chronology']) ?></div>
      <div><b>Wallet Appearance:</b> <?= htmlspecialchars($claim['wallet_appearance']) ?></div>
    </div>

    <div class="claim-btns">
      <form method="POST">
        <input type="hidden" name="approve_id" value="<?= $claim['id'] ?>">
        <button class="btn btn-primary" type="submit">Approve</button>
      </form>
      <form method="POST">
        <input type="hidden" name="reject_id" value="<?= $claim['id'] ?>">
        <button class="btn btn-outline-secondary" type="submit">Reject</button>
      </form>

    </div>
  </div>
</div>

<script>
  function closePopup(e) {
    window.location.href = 'approval-claim.php'; // Ganti sesuai halaman asal
  }
</script>

</body>
</html>
