<?php
  include("../query/search.php");

  $result = null;
  $searched = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id_number = $_POST['search_input'];
    $result = search($id_number);
    $searched = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Search Wallet - Findlet</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    body {
      background-color: #fefcee;
      font-family: system-ui, sans-serif;
    }

    .logo {
      width: 110px;
      height: 90px;
      background-color: #d6d6d6;
      border-radius: 10px;
      margin: 0 auto;
    }

    .brand-name {
      font-size: 36px;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
    }

    .tagline {
      text-align: center;
      color: #4f6835;
      font-size: 18px;
      margin-top: 10px;
      margin-bottom: 40px;
    }

    .search-container {
      max-width: 500px;
      margin: 0 auto;
    }

    .search-input-group .form-control {
      border-radius: 8px 0 0 8px;
      background-color: #f1f6c4;
      border: 2px solid #b9cc8d;
    }

    .search-btn {
      border-radius: 0 8px 8px 0;
      background-color: #b9cc8d;
      border: 2px solid #b9cc8d;
      color: #3d4f2d;
      font-weight: bold;
    }

    .search-btn:hover {
      background-color: #a5bb76;
    }

    .info-box {
      border: 2px solid #3d4f2d;
      border-radius: 10px;
      padding: 20px;
      background-color: white;
      max-width: 650px;
      margin: 40px auto 0 auto;
    }

    .info-box b {
      font-size: 18px;
      color: #1c2f16;
    }

    .info-box p {
      margin-top: 8px;
      font-size: 15px;
    }

    .popup-overlay {
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 999;
    }

    .popup-box {
      background-color: #ffffff;
      border: 2px solid #3d4f2d;
      border-radius: 10px;
      padding: 25px;
      width: 90%;
      max-width: 500px;
      margin: 150px auto;
      text-align: center;
    }

    .popup-box h5 {
      color: #1c2f16;
      font-weight: bold;
    }

    .popup-box .data {
      font-size: 16px;
      margin-top: 10px;
    }

    .claim-btn {
      background-color: #4f6835;
      color: white;
      padding: 12px 30px;
      font-size: 18px;
      border-radius: 8px;
      margin-top: 30px;
      text-decoration: none;
      display: inline-block;
    }

    .claim-btn:hover {
      background-color: #3a4f28;
    }
  </style>
</head>
<body>
  <div class="text-center mt-5">
    <a href="../index.php">
      <img src="../assets/findlet-hor.png" alt="Logo" width="250" height="auto">
    </a>

    <div class="tagline">Find your missing wallet</div>

    <form method="POST" class="search-container">
      <div class="input-group search-input-group">
        <input
          type="text"
          class="form-control"
          name="search_input"
          placeholder="Type your ID number (e.g., KTP or SIM)"
          required
        />
        <button class="btn search-btn" name="submit" type="submit">Search</button>
      </div>
    </form>

    <div class="info-box mt-4">
      <b>Search Information</b>
      <p>
        Enter the ID number that was in your lost wallet, such as your KTP or
        driver's license. We'll use it to check if your wallet has been found
        and listed on our website. If your lost wallet didn’t contain any ID
        card, we won’t be able to search for it here.
      </p>
    </div>
  </div>

  <?php if ($searched): ?>
    <div class="popup-overlay" id="popup">
      <div class="popup-box" id="popupBox">
        <?php if ($result): ?>
          <h5>We found your missing wallet!</h5>
          <div class="data">
            <div><b>ID Number</b> : <?= htmlspecialchars($result['id_number']) ?></div>
            <div><b>Name</b> : <?= htmlspecialchars($result['name_on_id']) ?></div>
          </div>
          <a href="form-claim.php" class="claim-btn">Claim My Wallet</a>
        <?php else: ?>
          <h5>Sorry 😢</h5>
          <div class="data mt-3">
            We don't have your wallet here :(
          </div>
        <?php endif; ?>
      </div>
    </div>

    <script>
      // Tutup popup saat klik di luar kotaknya
      document.getElementById("popup").addEventListener("click", function (e) {
        var box = document.getElementById("popupBox");
        if (!box.contains(e.target)) {
          this.style.display = "none";
        }
      });
    </script>
  <?php endif; ?>
</body>
</html>
