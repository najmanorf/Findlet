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

    .popup-overlay {
      display: none;
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
    <button class="btn btn-success" onclick="showPopup()">Search</button>
  </div>

  <div class="popup-overlay" id="popup">
    <div class="popup-box">
      <h5>We found your missing wallet!</h5>
      <div class="data">
        <div><b>ID Number</b> : 1234567812345678</div>
        <div><b>Name</b> : Harry E****** S*****</div>
      </div>
      <a href="form-claim.php" class="claim-btn">Claim My Wallet</a>
    </div>
  </div>

  <script>
    function showPopup() {
      document.getElementById("popup").style.display = "block";
    }
  </script>
</body>
</html>
