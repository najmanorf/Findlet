<?php
  session_start();
  if (isset($_SESSION['admin_logged_in'])) {
      header("Location: approval-claim.php");
      exit();
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Findlet - Login Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
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
        text-shadow: 0 1px #a3a3a3;
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

    </style>
  </head>
  <body>
    <div
      class="container-fluid full-height d-flex align-items-center justify-content-center"
    >
      <div class="row w-100">
        <!-- Login Section -->
        <div class="container-fluid full-height d-flex align-items-center justify-content-center">
          <div class="login-box">
            <div class="login-title">Sign In Admin</div>
            <form method="post" action="login.php">
              <div class="mb-3">
                <label for="username">📧 Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="username"
                />
              </div>
              <div class="mb-3">
                <label for="password">🔒 Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="password"
                />
              </div>
              <button type="submit" class="btn btn-signin">Sign In</button>
            </form>
          </div>
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
