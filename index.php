<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Findlet Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #fefcee;
        font-family: system-ui, sans-serif;
        background-image: url(""); /* Tambahkan background jika ada */
      }

      .logo {
        width: 110px;
        height: 90px;
        background-color: #d6d6d6;
        border-radius: 10px;
        margin: 0 auto;
      }

      .signin-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        background-color: #3e532b;
        color: white;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 20px;
        border: none;
      }

      .brand-name {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
      }

      .tagline {
        text-align: center;
        font-style: italic;
        color: #4f6835;
        margin-top: 10px;
        margin-bottom: 40px;
      }

      .btn-option {
        border: 2px solid #2e4725;
        padding: 12px 25px;
        font-weight: 600;
        border-radius: 10px;
        font-size: 16px;
        background-color: white;
        transition: 0.2s ease-in-out;
      }

      .btn-option:hover {
        background-color: #d1e0c6;
      }
    </style>
  </head>
  <body>
    <a href="../findlet/pages/approval-claim.php" class="signin-btn">My Dashboard</a>

    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 100vh"
    >
      <img src="assets/findlet-hor.png" alt="Logo" width = "250" height = "auto">
      <div class="tagline">Help you find your missing wallet</div>

      <div class="d-flex gap-3">
        <a href="pages/search.php" class="btn btn-option">Claim Missing Wallet</a>
        <a href="pages/form-report.php" class="btn btn-option">Report Missing Wallet</a>
      </div>
    </div>
  </body>
</html>
