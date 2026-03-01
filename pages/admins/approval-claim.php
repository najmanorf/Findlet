<?php
include_once "C:/xampp/htdocs/findlet/query/data.php";
include_once "C:/xampp/htdocs/findlet/query/database.php";

// Jika tombol pensil diklik
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_id'])) {
    $id = (int) $_POST['approve_id'];
    $query = "UPDATE wallet_claims SET status = 'Approved' WHERE id = $id";
    mysqli_query($koneksi, $query);
}

// Ambil data setelah perubahan
$data2 = getWalletClaims();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Findlet Admin - Claim Approval</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <?php
      include_once "C:/xampp/htdocs/findlet/query/data.php";
      $data2 = getWalletClaims();
    ?>

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

      .card-box {
        background-color: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      .status-badge {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 500;
        display: inline-block;
        color: #fff;
      }

      .status-badge.pending {
        background-color: #d1b700;
      }

      .status-badge.approved {
        background-color: #4caf50;
      }

      .status-badge.rejected {
        background-color: #af4c4cff;
      }

      .btn-action {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 6px;
        margin-right: 5px;
      }

      .btn-export {
        font-weight: 600;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
          <h2>🔍 Findlet</h2><br>
          <a href="approval-claim.php" class="nav-link active">✅ Claim Approval</a>
          <a href="approval-report.php" class="nav-link">📄 Report Approval</a>
          <a href="setting.php" class="nav-link">⚙️ Setting</a>
          <a href="logout.php" class="nav-link mt-auto">🚪 Log Out</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 px-0">
          <!-- Header -->
          <div class="topbar">
            <input type="text" class="search-input" placeholder="Search..." />
            <div class="user-profile">👤 Admin</div>
          </div>

          <!-- Export -->
          <div
            class="d-flex justify-content-between align-items-center px-4 my-4">
            <a href="export-claim.php" class="btn btn-success btn-export">⬇ Export CSV</a>
          </div>

          <!-- Table Box -->
          <div class="card-box mx-4">
            <table class="table table-borderless align-middle">
              <thead class="table-light">
                <tr>
                  <th>Wallet</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if($data2) : ?>
                <?php foreach($data2 as $item) : ?>
                <tr>
                  <td>
                    <strong><?= $item['name_on_id'] ?></strong><br />
                    <small><?= $item['id_number'] ?></small>
                  </td>
                  <td><?= $item['user_name'] ?></td>
                  <td><?= $item['created_at'] ?></td>
                  <td>
                    <span class="status-badge 
                      <?= $item['status'] === 'Pending' ? 'pending' : '' ?> 
                      <?= $item['status'] === 'Approved' ? 'approved' : '' ?>
                      <?= $item['status'] === 'Rejected' ? 'rejected' : '' ?>">
                      <?= $item['status'] ?>
                    </span>
                  </td>
                  <td>
                    <a
                      href="preview-claim.php?id=<?= $item['id'] ?>"
                      class="btn btn-sm btn-outline-success btn-action"
                      >✏️</a>
                    <a href="delete.php?id=<?= $item['id'] ?>" 
                      class="btn btn-sm btn-outline-danger btn-action" 
                      title="Delete"
                      onclick="return confirm('Are you sure you want to delete this data?')">
                      🗑️
                    </a>
                  </td>
                  <?php endforeach; ?>
                <?php endif; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
