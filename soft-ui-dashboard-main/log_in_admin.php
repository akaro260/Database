<?php
session_start();
include 'soft-ui-dashboard-main\pages\header\koneksi.php';



if (isset($_POST['login'])) {
  $user = $_POST['user'];
  $pass = $_POST['password'];

  // CEK ADMIN
  $admin = mysqli_query(
    $koneksi,
    "SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass'"
  );

  // CEK SISWA

  if (mysqli_num_rows($admin) > 0) {
    $_SESSION['role'] = 'admin';
    $_SESSION['user'] = $user;
    header("Location: soft-ui-dashboard-main\pages\dashboard\dashborad.php");
  } else {
    $error = true;
  }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    min-height: 100vh;
  }

  .card {
    border-radius: 15px;
  }
</style>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login Voting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .card {
      border-radius: 15px;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width:420px">

      <h3 class="text-center fw-bold">Login Voting 🗳️</h3>
      <p class="text-center text-muted">Admin</p>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger text-center">
          Username / NIS atau Password salah
        </div>
      <?php endif; ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Username / NIS</label>
          <input type="text" name="user" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100" name="login">
          Login
        </button>
        <hr>

        <div class="text-center">
          <span class="text-muted">Bukan admin?</span><br>
          <a href="log_in_siswa.php" class="btn btn-outline-secondary mt-2 w-100">
            Login sebagai Siswa
          </a>
        </div>

      </form>

    </div>
  </div>
</body>

</html>