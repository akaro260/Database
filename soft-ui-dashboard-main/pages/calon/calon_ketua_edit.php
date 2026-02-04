<?php
include "../header/koneksi.php";



// ambil id dari URL
$id = $_GET['id'];

// ambil data calon berdasarkan id
$data = mysqli_query($koneksi, "SELECT * FROM tbl_calon_ketua WHERE id_calon='$id'");
$calon = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    $nama_calon = $_POST['nama_calon'];
    $visi       = $_POST['visi'];
    $misi       = $_POST['misi'];
    $foto       = $_POST['foto'];

    $update = mysqli_query($koneksi, "
        UPDATE tbl_calon_ketua SET
        nama_calon='$nama_calon',
        visi='$visi',
        misi='$misi',
        foto='$foto'
        WHERE id_calon='$id'
    ");

      header("Location: calon_ketua.php");
      exit;

}
include "header.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Calon Ketua</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h5>Edit Data Calon Ketua</h5>
    </div>
    <div class="card-body">
      <form method="POST">
        <div class="mb-3">
          <label>Nama Calon</label>
          <input type="text" name="nama_calon" class="form-control"
                 value="<?= $calon['nama_calon']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Visi</label>
          <textarea name="visi" class="form-control" rows="3" required><?= $calon['visi']; ?></textarea>
        </div>

        <div class="mb-3">
          <label>Misi</label>
          <textarea name="misi" class="form-control" rows="3" required><?= $calon['misi']; ?></textarea>
        </div>

        <div class="mb-3">
          <label>Foto</label>
          <input type="text" name="foto" class="form-control"
                 value="<?= $calon['foto']; ?>">
        </div>

        <button type="submit" name="update" class="btn btn-primary mt-3">
          Update
        </button>
        <a href="calon_ketua.php" class="btn btn-secondary mt-3">
          Kembali
        </a>
      </form>
    </div>
  </div>
</div>

</body>
</html>
