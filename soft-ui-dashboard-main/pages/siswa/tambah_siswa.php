<?php
include "../header/header.php";
include "../header/koneksi.php";
?>

   
   <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
     <form method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="Nama" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Kelas</label>
              <input type="text" name="Kelas" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Jurusan</label>
              <input type="text" name="Jurusan" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <input type="text" name="Alamat" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Simpan</button>
          </div>
        </form>

<?php
$berhasil = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama    = $_POST['Nama'];
    $kelas   = $_POST['Kelas'];
    $jurusan = $_POST['Jurusan'];
    $alamat  = $_POST['Alamat'];

    $query = "INSERT INTO tbl_siswa (Nama, Kelas, Jurusan, Alamat)
              VALUES ('$nama', '$kelas', '$jurusan', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        $berhasil = true;
    } 
    }

?>



          </div>
        </div>
      </div>
    </div>
    
<?php if ($berhasil): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data siswa berhasil ditambahkan',
    timer: 2000,
    showConfirmButton: false
}).then(() => {
    window.location.href = 'siswa.php';
})
</script>
<?php endif; ?>

  