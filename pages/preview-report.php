<?php
include "../query/database.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Ambil data klaim berdasarkan ID
$query = "SELECT * FROM wallet_reports WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
$data = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Preview Claim</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f3f8e9;
      font-family: system-ui, sans-serif;
    }

    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 999;
    }

    .popup-box {
      background-color: #ffffff;
      border: 2px solid #3d4f2d;
      border-radius: 15px;
      padding: 30px;
      width: 90%;
      max-width: 600px;
    }

    .popup-box h4 {
      color: #1c2f16;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .data-item {
      margin-bottom: 12px;
      font-size: 15px;
    }

    .data-item b {
      color: #3a5d27;
    }

    .image-preview {
      margin-top: 15px;
      display: flex;
      gap: 20px;
      justify-content: center;
    }

    .image-preview img {
      max-width: 45%;
      height: auto;
      border: 2px solid #ccc;
      border-radius: 8px;
    }

    .action-buttons {
      margin-top: 25px;
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .btn-approve {
      background-color: #4e7734;
      color: white;
      font-weight: bold;
    }

    .btn-reject {
      background-color: #dee2e6;
      font-weight: bold;
    }
  </style>
</head>
<body>

<?php if ($data): ?>
  <div class="popup-overlay" onclick="closePopup(event)">
    <div class="popup-box" onclick="event.stopPropagation()">
      <h4>Claim Preview</h4>

      <div class="data-item"><b>ID Number:</b> <?= htmlspecialchars($data['id_number']) ?></div>
      <div class="data-item"><b>Name:</b> <?= htmlspecialchars($data['name_on_id']) ?></div>
      <div class="data-item"><b>Gender:</b> <?= htmlspecialchars($data['gender']) ?></div>
      <div class="data-item"><b>Address:</b> <?= htmlspecialchars($data['address']) ?></div>
      <div class="data-item"><b>Birth Place:</b> <?= htmlspecialchars($data['birth_place']) ?></div>
      <div class="data-item"><b>Birth Date:</b> <?= htmlspecialchars($data['birth_date']) ?></div>

        <div class="image-preview">
        <?php if (!empty($data['wallet_image'])): ?>
            <img src="../uploads/<?= rawurlencode($data['wallet_image']) ?>" alt="Wallet Image">
        <?php endif; ?>
        <?php if (!empty($data['card_image'])): ?>
            <img src="../uploads/<?= rawurlencode($data['card_image']) ?>" alt="ID Card Image">
        <?php endif; ?>
        </div>
    </div>
  </div>
<?php else: ?>
  <div class="text-center mt-5 text-danger">
    <h4>Data tidak ditemukan.</h4>
  </div>
<?php endif; ?>

<script>
  function closePopup(e) {
    window.location.href = 'approval-report.php';
  }
</script>

</body>
</html>

