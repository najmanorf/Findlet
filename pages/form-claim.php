<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Claim the Missing Wallet</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #f3f8e9;
        font-family: system-ui, sans-serif;
      }

      .form-wrapper {
        max-width: 600px;
        margin: 30px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      }

      .form-title {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
      }

      .form-title small {
        font-weight: normal;
        color: #6c757d;
      }

      .id-options {
        display: flex;
        justify-content: space-between;
        gap: 10px;
      }

      .btn-option {
        flex: 1;
        border: 2px solid #4e7734;
        color: #4e7734;
        font-weight: 600;
      }

      .btn-check:checked + .btn-option {
        background-color: #4e7734;
        color: white;
      }

      .form-label {
        font-weight: 600;
        margin-bottom: 5px;
        color: #212529;
      }

      .form-control {
        border-radius: 8px;
        border: 1.5px solid #adc891;
        font-size: 14px;
      }

      .form-check-label {
        font-weight: 500;
      }

      .btn-reset {
        border: 2px solid #6c757d;
        color: #6c757d;
        font-weight: 600;
      }

      .btn-reset:hover {
        background-color: #dfe3dc;
      }

      .btn-submit {
        background-color: #4e7734;
        color: white;
        font-weight: 600;
        border: none;
      }

      .btn-submit:hover {
        background-color: #3a5d27;
      }

      .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="form-wrapper">
        <h2 class="form-title">
          Findlet<br /><small>Claim your missing wallet</small>
        </h2>

        <form
          action=""
          method="POST"
        >

          <!-- User ID -->
          <div class="mb-3">
            <label class="form-label">User ID</label>
            <input
              type="text"
              class="form-control"
              name="id_user"
              placeholder="Enter your User ID"
              required
            />
          </div>

          <!-- Choose ID Type -->
          <div class="mb-3">
            <label class="form-label">Choose ID Type</label>
            <div class="id-options">
              <input
                type="radio"
                class="btn-check"
                name="id_type"
                id="ktp"
                value="KTP"
                checked
              />
              <label class="btn btn-option" for="ktp"
                >National ID Card (KTP)</label
              >

              <input
                type="radio"
                class="btn-check"
                name="id_type"
                id="sim"
                value="SIM"
              />
              <label class="btn btn-option" for="sim"
                >Driver's License (SIM)</label
              >
            </div>
          </div>

          <!-- ID Number -->
          <div class="mb-3">
            <label class="form-label">ID Number</label>
            <input
              type="text"
              class="form-control"
              name="id_number"
              placeholder="As shown on the ID in the missing wallet"
              required
            />
          </div>

          <!-- Full Name -->
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input
              type="text"
              class="form-control"
              name="name_on_id"
              placeholder="As shown on the ID in the missing wallet"
              required
            />
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label class="form-label">Address</label>
            <input
              type="text"
              class="form-control"
              name="address"
              placeholder="As shown on the ID in the missing wallet"
              required
            />
          </div>

          <!-- Gender -->
          <div class="mb-3">
            <label class="form-label">Gender</label><br />
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="male"
                value="Male"
                checked
              />
              <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="female"
                value="Female"
              />
              <label class="form-check-label" for="female">Female</label>
            </div>
          </div>

          <!-- Birth Place -->
          <div class="mb-3">
            <label class="form-label">Birth Place</label>
            <input
              type="text"
              class="form-control"
              name="birth_place"
              placeholder="As shown on the ID in the missing wallet"
              required
            />
          </div>

          <!-- Birth Date -->
          <div class="mb-3">
            <label class="form-label">Birth Date</label>
            <input
              type="date"
              class="form-control"
              name="birth_date"
              required
            />
          </div>

          <!-- Chronology -->
          <div class="mb-3">
            <label class="form-label">Chronology</label>
            <input
              type="text"
              class="form-control"
              name="chronology"
              placeholder="Explain the chronology of how you lost your wallet"
              required
            />
          </div>

          <!-- Wallet Appearance -->
          <div class="mb-3">
            <label class="form-label">Wallet Appearance</label>
            <input
              type="text"
              class="form-control"
              name="wallet_appearance"
              placeholder="Describe your missing wallet appearance"
              required
            />
          </div>

          <!-- Buttons -->
          <div class="form-actions">
            <button type="reset" class="btn btn-reset w-50">Reset</button>
            <button type="submit" name="submit" class="btn btn-submit w-50">
              Send Claim
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

<?php
include "../query/input-form.php";
if (isset($_POST['submit'])) {
    if (saveWalletClaim($_POST)) {
        echo "<script>
                alert('Data berhasil disimpan!');
                window.location.href = '../pages/approval-claim.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data!');
              </script>";
    }
}
?>


