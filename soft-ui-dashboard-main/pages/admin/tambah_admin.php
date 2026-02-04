<?php
include "../header/koneksi.php";
include "../header/header.php";
?>


<form method="POST">
  <div class="mb-3">
    <label class="form-label">Nama Admin</label>
    <input type="text" name="Nama" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="Username" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="Password" class="form-control" required>
  </div>

    <div class="mb-3">
    <label class="form-label">Alamat</label>
    <input type="password" name="Alamat" class="form-control" required>
  </div>

  <button class="btn btn-success w-100">Simpan</button>
  
</form>
<?php


$berhasil = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama     = $_POST['Nama'];
    $username = $_POST['Username'];
    $password = $_POST['Password']; // md5 nanti aja
    $alamat   = $_POST['Alamat'];

    $query = "INSERT INTO tbl_admin (Nama, Username, Password, Alamat)
              VALUES ('$nama', '$username', '$password', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        $berhasil = true;
    } 
}
?>
<?php if ($berhasil): ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil!',
  text: 'Admin berhasil ditambahkan'
}).then(() => {
  window.location.href = 'edit_admin.php';
});
</script>
<?php endif; ?>

