<?php

session_start();



include "../header/koneksi.php";
include "../header/header.php";


// ambil id dari URL
$id = $_GET['id'];

// ambil data siswa berdasarkan id
$data = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin='$id'");
$siswa = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    $nama    = $_POST['Username'];
    $kelas   = $_POST['Nama'];
    $alamat  = $_POST['Alamat'];

    $update = mysqli_query($koneksi, "
        UPDATE tbl_siswa SET
        Username='$nama',
        Nama='$kelas',
        Alamat='$alamat'
        WHERE id_admin='$id'
    ");

      header("Location: Admin.php");
      exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="card">
    <div class="card-header  text-white">
      <h5>Edit Data Siswa</h5>
      <form method="POST">
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="Username" class="form-control"
                 value="<?= $siswa['Username']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Kelas</label>
          <input type="text" name="Kelas" class="form-control"
                 value="<?= $siswa['Nama']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Alamat</label>
          <textarea name="Alamat" class="form-control" required><?= $siswa['Alamat']; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-primary mt-3 ">
          Update
        </button>
        <a href="edit_admin.php" class="btn btn-secondary mt-3 ms-3">
          Kembali
        </a>
      </form>
    </div>
  </div>
</div>

</body>
</html>
