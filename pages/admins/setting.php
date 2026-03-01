<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Findlet Admin - Setting</title>
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
      }

      .nav-link:hover {
        background-color: #c7db68;
        color: #000;
      }

      .nav-link.active {
        background-color: #5d772f;
        color: white;
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

      .form-box {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      }

      .form-label {
        font-weight: 600;
        color: #333;
      }

      .form-control {
        border-radius: 10px;
        padding: 10px;
        border: 1.5px solid #adc891;
      }

      .btn-reset {
        background-color: #dee2e6;
        color: #333;
        font-weight: 600;
      }

      .btn-save {
        background-color: #4f6835;
        color: white;
        font-weight: 600;
      }

      .btn-save:hover {
        background-color: #3e532b;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
          <h2>🔍 Findlet</h2><br>
          <a href="approval-claim.php" class="nav-link">✅ Claim Approval</a>
          <a href="approval-report.php" class="nav-link">📄 Report Approval</a>
          <a href="setting.php" class="nav-link active">⚙️ Setting</a>
          <a href="logout.php" class="nav-link">🚪 Log Out</a>
        </div>

        <!-- Main Area -->
        <div class="col-md-10 px-0">
          <!-- Header -->
          <div class="topbar">
            <input type="text" class="search-input" placeholder="Search..." />
            <div class="user-profile">👤 Najma</div>
          </div>

          <!-- Main Content -->
          <div class="p-4">
            <h2 class="mb-4 fw-bold">User Settings</h2>
            <div class="form-box">
              <form method="post" action="#">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    id="username"
                    class="form-control"
                    value="Najma"
                  />
                </div>

                <div class="mb-3">
                  <label for="email_setting" class="form-label">Email</label>
                  <input
                    type="email"
                    id="email_setting"
                    class="form-control"
                    value="najmanoorfitri14@gmail.com"
                  />
                </div>

                <div class="mb-3">
                  <label for="phone_setting" class="form-label">Phone</label>
                  <input
                    type="tel"
                    id="phone_setting"
                    class="form-control"
                    value="+62 123 4567 8900"
                  />
                </div>

                <div class="mb-3">
                  <label for="password_setting" class="form-label"
                    >Password</label
                  >
                  <input
                    type="password"
                    id="password_setting"
                    class="form-control"
                    value="********"
                  />
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                  <button type="reset" class="btn btn-reset px-4">Reset</button>
                  <button type="submit" class="btn btn-save px-4">
                    Save Changes
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
