<?php
include "koneksi.php";
include "header.php";
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama     = $_POST['Nama'];
    $username = $_POST['Username'];
    $password = md5($_POST['Password']);
    $alamat   = $_POST['Alamat'];

   // sementara md5 dulu

    $query = "INSERT INTO tbl_admin (Nama, Username, Password, Alamat)
              VALUES ('$nama', '$username', '$password','$alamat')";

    if (mysqli_query($koneksi, $query)) {
        echo "<div class='alert alert-success text-center'>
                Admin berhasil ditambahkan
              </div>";
    } else {
        echo "<div class='alert alert-danger text-center'>
                Gagal: " . mysqli_error($koneksi) . "
              </div>";
    }
}
?>
