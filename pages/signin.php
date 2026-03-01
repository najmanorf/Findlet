<?php
session_start();
if (isset($_SESSION['user_logged_in'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Findlet Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      background-color: #edf09d;
      font-family: system-ui, sans-serif;
    }

    .full-height {
      height: 100vh;
    }

    .login-box {
      background-color: #ffffff;
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-title {
      font-weight: 700;
      font-size: 24px;
      margin-bottom: 30px;
      text-align: center;
      color: #1e1e1e;
    }

    label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
      color: #1e1e1e;
    }

    .form-control {
      border-radius: 8px;
      border: 1.5px solid #6a8745;
      font-size: 14px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #4f6835;
    }

    .btn-signin {
      background-color: #4f6835;
      border: none;
      color: white;
      font-weight: 600;
      font-size: 16px;
      padding: 10px;
      border-radius: 8px;
      width: 100%;
      margin-top: 15px;
    }

    .btn-signin:hover {
      background-color: #3e532b;
    }

    .signup-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .signup-link a {
      color: #2b2b2b;
      text-decoration: underline;
    }

    .right-panel {
      text-align: center;
    }

    @media (max-width: 767px) {
      .right-panel {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid full-height d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <!-- Login Section -->
      <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div class="login-box">
          <div class="login-title">Let’s Get You In</div>
          <form method="post" action="../query/login.php">
            <div class="mb-3">
              <label for="email">📧 Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required />
            </div>
            <div class="mb-3">
              <label for="password">🔒 Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="*****" required />
            </div>
            <button type="submit" name="login" class="btn btn-signin">Sign In</button>
            <div class="signup-link">
              <a href="signup.php">Sign Up Here</a>
            </div>
          </form>
        </div>
      </div>

      <!-- Right Panel -->
      <div class="col-md-6 right-panel d-flex flex-column align-items-center justify-content-center">
        <img src="../assets/findlet-hor.png" alt="Logo" width="350" />
        <div class="tagline mt-3"><h3>Help you find your missing wallet</h3></div>
      </div>
    </div>
  </div>
</body>
</html>
