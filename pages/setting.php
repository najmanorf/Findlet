<?php
  require "../query/get-user.php";

  // 🔧 Sementara, ID user di-set manual
  $userId = 12; 

  // Ambil data user untuk ditampilkan di form
  $user = getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Findlet User - Setting</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #f5f5f5;
        font-family: system-ui, sans-serif;
      }

      .sidebar {
        height: 100vh;
        background-color: #dce984;
        padding: 30px 20px;
      }

      .nav-link {
        color: #000;
        font-weight: 500;
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 10px;
        display: block;
      }

      .nav-link:hover {
        background-color: #c7db68;
        color: #000;
      }

      .nav-link.active {
        background-color: #5d772f;
        color: white !important;
      }

      .topbar {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        padding: 12px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .search-input {
        border: 1px solid #ccc;
        padding: 6px 14px;
        border-radius: 20px;
        width: 250px;
      }

      .user-profile {
        background-color: #4f6835;
        color: white;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 20px;
      }

      .filter-btn {
        border: 2px solid #4f6835;
        background-color: white;
        color: #4f6835;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 18px;
      }

      .card-box {
        background-color: white;
        padding: 15px 20px;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      .card-info {
        display: flex;
        align-items: center;
        gap: 15px;
      }

      .avatar-initial {
        background-color: #abc97c;
        color: white;
        font-weight: bold;
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
      }

      .name-text {
        margin: 0;
        font-weight: 600;
      }

      .date-text {
        font-size: 14px;
        color: #666;
        margin: 0;
      }

      .action-link {
        font-weight: 500;
        text-decoration: underline;
        color: #000;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
          <h2><a href="../index.php" style="text-decoration: none; color: inherit;">🔍 Findlet</a></h2>
          <br>
          <a href="approval-claim.php" class="nav-link">✅ Claim Approval</a>
          <a href="approval-report.php" class="nav-link">📄 Report Approval</a>
          <a href="setting.php" class="nav-link active">⚙️ Setting</a>
          <a href="logout.php" class="nav-link mt-auto">🚪 Log Out</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
          <h2 class="mb-4 fw-bold">User Settings</h2>
          <div class="form-box">
            <form method="post" action="#">
              <input type="hidden" name="id" value="<?= $userId ?>">

              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  value="<?= $user['name'] ?>"
                />
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  value="<?= $user['email'] ?>"
                />
              </div>

              <div class="mb-3">
                <label for="phone_setting" class="form-label">Phone</label>
                <input
                  type="tel"
                  name="phone"
                  class="form-control"
                  value="<?= $user['phone'] ?>"
                />
              </div>

              <div class="mb-3">
                <label for="password_setting" class="form-label">Password</label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  value="********"
                />
              </div>

              <div class="d-flex justify-content-end gap-3 mt-4">
                <button type="reset" class="btn btn-secondary px-4">Reset</button>
                <button type="submit" name="submit" class="btn btn-success px-4">
                  Save Changes
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
  include("../query/update-setting.php");

  if(isset($_POST['submit'])) {
      $name  = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      if(updateUser($userId, $name, $email, $phone)) {
          echo "<script>
                  alert('Data succsessfully changed!');
                  window.location.href = 'setting.php';
                </script>";;
      } else {
          echo "Failed to change data";
      }
  }
?>