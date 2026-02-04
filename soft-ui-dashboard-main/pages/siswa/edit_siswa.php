<?php
include "../header/koneksi.php";

$berhasil = false;


// ambil id
$id = $_GET['id'];

// ambil data siswa
$data = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa='$id'");
$siswa = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    $nama    = $_POST['Nama'];
    $kelas   = $_POST['Kelas'];
    $jurusan = $_POST['Jurusan'];
    $alamat  = $_POST['Alamat'];

    $update = mysqli_query($koneksi, "
        UPDATE tbl_siswa SET
        Nama='$nama',
        Kelas='$kelas',
        Jurusan='$jurusan',
        Alamat='$alamat'
        WHERE id_siswa='$id'
    ");

    if ($update) {
        $berhasil = true;
        // refresh data biar form ke-update
    } 
}

include "../header/header.php";
?>


<div class="container mt-5">
  <div class="card">
    <div class="card-header  text-white">
      <h5>Edit Data Siswa</h5>
      <form method="POST">
        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="Nama" class="form-control"
                 value="<?= $siswa['Nama']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Kelas</label>
          <input type="text" name="Kelas" class="form-control"
                 value="<?= $siswa['Kelas']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Jurusan</label>
          <input type="text" name="Jurusan" class="form-control"
                 value="<?= $siswa['Jurusan']; ?>" required>
        </div>

        <div class="mb-3">
          <label>Alamat</label>
          <textarea name="Alamat" class="form-control" required><?= $siswa['Alamat']; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-primary mt-3 ms-3">
          Update
        </button>
        <a href="siswa.php" class="btn btn-secondary mt-3 ms-3">
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
