<?php
include "../header/koneksi.php";
include "../header/header.php";
$berhasil = false;

// cek id ada atau tidak
if (!isset($_GET['id'])) {
  header("Location: siswa.php");
  exit;
}

$id = $_GET['id'];

// ambil data siswa
$data = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa='$id'");
$siswa = mysqli_fetch_assoc($data);

if (!$siswa) {
  header("Location: siswa.php");
  exit;
}

if (isset($_POST['update'])) {

  $nama = $_POST['Nama'];
  $email = $_POST['Email'];
  $kelas = $_POST['Kelas'];
  $jurusan = $_POST['Jurusan'];
  $alamat = $_POST['Alamat'];

  $folder = "../../assets/img/";
  $fotoLama = $siswa['foto'];

  // =============================
  // CEK UPLOAD FOTO
  // =============================
  if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {

    $namaFile = $_FILES['foto']['name'];
    $tmpFile = $_FILES['foto']['tmp_name'];
    $namaBaru = time() . "_" . $namaFile;

    move_uploaded_file($tmpFile, $folder . $namaBaru);

    // hapus foto lama
    if (!empty($fotoLama) && file_exists($folder . $fotoLama)) {
      unlink($folder . $fotoLama);
    }

    $update = mysqli_query($koneksi, "
            UPDATE tbl_siswa SET
            foto='$namaBaru',
            Nama='$nama',
            email='$email',
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
            email='$email',
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
?>



<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0 text-white">Edit Data Siswa</h5>
    </div>

    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">

        <!-- Nama -->
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="Nama" class="form-control" value="<?= $siswa['Nama']; ?>" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="Email" class="form-control" value="<?= $siswa['email']; ?>" required>
        </div>
        <!-- Password Baru -->
        <div class="mb-3">
          <label class="form-label">Password Baru</label>
          <input type="password" name="password" class="form-control">
          <small class="text-muted">
            Kosongkan jika tidak ingin mengganti password
          </small>
        </div>

        <!-- Kelas -->
        <div class="mb-3">
          <label class="form-label">Kelas</label>
          <input type="text" name="Kelas" class="form-control" value="<?= $siswa['Kelas']; ?>" required>
        </div>

        <!-- Jurusan -->
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <input type="text" name="Jurusan" class="form-control" value="<?= $siswa['Jurusan']; ?>" required>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea name="Alamat" class="form-control" rows="3" required><?= $siswa['Alamat']; ?></textarea>
        </div>

        <!-- Foto Saat Ini -->
        <div class="mb-3">
          <label class="form-label">Foto Saat Ini</label><br>
          <?php if (!empty($siswa['foto'])): ?>
            <img src="../../assets/img/<?= $siswa['foto']; ?>" width="120" class="rounded shadow-sm mb-2">
          <?php else: ?>
            <small class="text-muted">Belum ada foto</small>
          <?php endif; ?>
        </div>

        <!-- Ganti Foto -->
        <div class="mb-3">
          <label class="form-label">Ganti Foto</label>
          <input type="file" name="foto" class="form-control">
          <small class="text-muted">Format: JPG/PNG</small>
        </div>

        <!-- Button -->
        <div class="mt-4">
          <button type="submit" name="update" class="btn btn-primary">
            Update
          </button>

          <a href="siswa.php" class="btn btn-secondary ms-2">
            Kembali
          </a>
        </div>

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