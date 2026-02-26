<?php

include "../header/koneksi.php";

// ambil id dari URL
$id = $_GET['id'];

// ambil data admin
$data = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin='$id'");
$siswa = mysqli_fetch_assoc($data);

// proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nama = $_POST['Username'];
  $kelas = $_POST['Nama'];
  $alamat = $_POST['Alamat'];
  $pass = $_POST['password'];
  $folder = "../../assets/img/";
  $email = $_POST['email'];


  // CEK ADA FOTO ATAU TIDAK
  if ($_FILES['foto']['error'] === 0) {

    $namaFile = $_FILES['foto']['name'];
    $tmpFile = $_FILES['foto']['tmp_name'];
    $namabaru = time() . "_" . $namaFile;

    move_uploaded_file($tmpFile, $folder . $namabaru);

    mysqli_query($koneksi, "
      UPDATE tbl_admin SET
        foto='$namabaru',
        Username='$nama'
        email='$email',
        password='$pass',
        Nama='$kelas',
        Alamat='$alamat'
      WHERE id_admin='$id'
    ");

  } else {

    mysqli_query($koneksi, "
      UPDATE tbl_admin SET        
        Username='$nama',
        Nama='$kelas',
        email='$email',
        password='$pass',
        Alamat='$alamat'
      WHERE id_admin='$id'
    ");
  }

  header("Location: edit_admin.php");
  exit;
}

// BARU HEADER HTML DIPANGGIL
include "../header/header.php";
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
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" name="Username" class="form-control" value="<?= $siswa['Username']; ?>" required>
          </div>
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="Nama" class="form-control" value="<?= $siswa['Nama'] ?>">
          </div>


          <div class="mb-3 position-relative">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control"
              value="<?= $siswa['Password']; ?>">

            <i class="fa-solid fa-eye" id="togglePassword" onclick="togglePassword()"
              style="position:absolute;right:15px; top: 40px; cursor:pointer; color:#6c757d;">
            </i>
          </div>

          <div class="mb3">
            <label for="">email</label>
            <input type="text" name="email" class="form-control" value="<?= $siswa['email'];?>">
          </div>


          <div class="mb-3">
            <label>Alamat</label>
            <textarea name="Alamat" class="form-control" required><?= $siswa['Alamat']; ?></textarea>
          </div>
          <div class="mb-3">
            <label>Foto</label><br>

            <?php if (!empty($siswa['foto'])): ?>
              <img src="../../assets/img/<?= $siswa['foto']; ?>" width="80" class="mb-2 rounded shadow">
            <?php endif; ?>
 <input type="file" name="foto" class="form-control mt-2">
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
<script>
  function togglePassword() {
    const pass = document.getElementById("password");
    const icon = document.getElementById("togglePassword");

    if (pass.type === "password") {
      pass.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      pass.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>


</html>