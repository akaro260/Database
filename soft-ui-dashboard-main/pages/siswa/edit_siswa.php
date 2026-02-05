<?php
include "../header/koneksi.php";
$berhasil = false;

$id = $_GET['id'];

// ambil data siswa
$data = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa='$id'");
$siswa = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

  $nama = $_POST['Nama'];
  $email = $_POST['Email'];
  $kelas = $_POST['Kelas'];
  $jurusan = $_POST['Jurusan'];
  $alamat = $_POST['Alamat'];

  $folder = "../../assets/img/";
  $fotoLama = $siswa['foto'];

  // cek upload foto
  if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {

    $namaFile = $_FILES['foto']['name'];
    $tmpFile = $_FILES['foto']['tmp_name'];
    $namaBaru = time() . "_" . $namaFile;

    move_uploaded_file($tmpFile, $folder . $namaBaru);

    // hapus foto lama (kalau ada)
    if (!empty($fotoLama) && file_exists($folder . $fotoLama)) {
      unlink($folder . $fotoLama);
    }

    $update = mysqli_query($koneksi, "
            UPDATE tbl_siswa SET
            foto='$namaBaru',
            Nama='$nama',
            Email='$email',
            Kelas='$kelas',
            Jurusan='$jurusan',
            Alamat='$alamat'
            WHERE id_siswa='$id'
        ");

  } else {

    // update tanpa ganti foto
    $update = mysqli_query($koneksi, "
            UPDATE tbl_siswa SET
            Nama='$nama',
            Email='$email',
            Kelas='$kelas',
            Jurusan='$jurusan',
            Alamat='$alamat'
            WHERE id_siswa='$id'
        ");
  }

  if ($update) {
    $berhasil = true;
  }
}

include "../header/header.php";
?>




<div class="container mt-5">
  <div class="card">
    <div class="card-header  text-white">
      <h5>Edit Data Siswa</h5>
      <form method="POST" enctype="multipart/form-data">


        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="Nama" class="form-control" value="<?= $siswa['Nama']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="Email" class="form-control" value="<?= $siswa['email']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Kelas</label>
          <input type="text" name="Kelas" class="form-control" value="<?= $siswa['Kelas']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Jurusan</label>
          <input type="text" name="Jurusan" class="form-control" value="<?= $siswa['Jurusan']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Alamat</label>
          <textarea name="Alamat" class="form-control" required><?= $siswa['Alamat']; ?></textarea>
        </div>
        <div class="mb-3">
          <label>Foto Saat Ini</label><br>
          <?php if (!empty($siswa['foto'])): ?>
            <img src="../../assets/img/<?= $siswa['foto']; ?>" width="120" class="mb-2 rounded">
          <?php else: ?>
            <small class="text-muted">Belum ada foto</small>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label>Ganti Foto</label>
          <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-primary mt-3">
          Update
        </button>
        <a href="siswa.php" class="btn btn-secondary mt-3 ms-2">
          Kembali
        </a>
      </form>

    </div>
  </div>
</div>
<?php if ($berhasil): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: 'Data siswa berhasil diperbarui',
      confirmButtonText: 'OK'
    }).then(() => {
      window.location.href = 'siswa.php';
    });
  </script>
<?php endif; ?>