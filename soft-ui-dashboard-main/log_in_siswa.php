<?php
session_start();
include "soft-ui-dashboard-main/pages/header/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email    = $_POST['email'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM tbl_siswa 
         WHERE Nama='$username' 
         AND email='$email'"
    );

    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['Nama'];

        header("Location: soft-ui-dashboard-main/pages/voting/Vote.php");
        exit;
    } else {
        header("Location: login_siswa.php?error=1");
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 400px;">
            <div class="card-body">
                <h4 class="text-center mb-4">Login</h4>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger text-center">
                        Username atau Password salah!
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Login
                    </button>
                    <hr>

                    <div class="text-center">
                        <span class="text-muted">Admin?</span><br>
                        <a href="index.php" class="btn btn-outline-primary mt-2 w-100">
                            Login sebagai Admin
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>