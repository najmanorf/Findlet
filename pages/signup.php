<?php
  session_start();
  if (isset($_SESSION['admin_logged_in'])) {
      header("Location: approval-claim.php");
      exit();
  }
?>

<?php
require '../query/signup-signin.php';

if(isset($_POST["register"])) {

  if(signup($_POST)>0) {
    ECHO "<script>
            alert('new user successfully added!');
          </script>";
  } else {
    echo mysqli_error($koneksi);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Findlet Sign Up</title>
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

      .signup-box {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
      }

      .signup-title {
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

      .btn-signup {
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

      .btn-signup:hover {
        background-color: #3e532b;
      }

      .signin-link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
      }

      .signin-link a {
        color: #2b2b2b;
        text-decoration: underline;
      }

      .logo-box {
        width: 120px;
        height: 100px;
        background-color: #d6d6d6;
        border-radius: 10px;
        margin: 0 auto 20px auto;
      }

      .brand-text {
        font-size: 28px;
        font-weight: bold;
        color: #1f1f1f;
      }

      .tagline {
        font-style: italic;
        color: #4f6835;
        margin-top: 8px;
        font-size: 15px;
      }

      @media (max-width: 767px) {
        .right-panel {
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <div
      class="container-fluid full-height d-flex align-items-center justify-content-center"
    >
      <div class="row w-100">
        <!-- Signup Section -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <div class="signup-box">
            <div class="signup-title">Let’s Get Started</div>
            <form method="post" action="">
              <div class="mb-3">
                <label for="name">👤 Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Input your name"
                />
              </div>
              <div class="mb-3">
                <label for="email">📧 Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Input your email"
                />
              </div>
              <div class="mb-3">
                <label for="phone">📞 Phone</label>
                <input
                  type="tel"
                  class="form-control"
                  id="phone"
                  name="phone"
                  placeholder="Input your phone number"
                />
              </div>
              <div class="mb-3">
                <label for="password">🔒 Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Input your password"
                />
              </div>
              <button type="submit" name="register" class="btn btn-signup">Sign Up</button>
              <div class="signin-link">
                <a href="signin.php">Sign In Here</a>
              </div>
            </form>
          </div>
        </div>

        <!-- Right Panel -->
        <div
          class="col-md-6 d-flex flex-column align-items-center justify-content-center right-panel text-center"
        >
          <img src="../assets/findlet-hor.png" alt="Logo" width = "350" height = "auto">
          <div class="tagline"><h3>Help you find your missing wallet</h3></div>
        </div>
      </div>
    </div>
  </body>
</html>
