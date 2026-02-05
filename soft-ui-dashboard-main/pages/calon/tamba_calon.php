<?php
include "../header/koneksi.php";
include "../header/header.php";



//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path
$berhasil = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $calon_ketua = $_POST['nama_calon'];
    $pos_visi = $_POST['visi'];
    $pos_misi = $_POST['misi'];
    $folder = "../../assets/img/";

    $namaFile = $_FILES["foto"]["name"];
    $tmpFile = $_FILES["foto"]["tmp_name"];

    $namabaru = time() . "_" . $namaFile;

    move_uploaded_file($tmpFile, $folder . $namabaru);


    $query = mysqli_query($koneksi, "INSERT INTO tbl_calon_ketua
    (nama_calon, visi, misi, foto)
    VALUES ('$calon_ketua','$pos_visi','$pos_misi','$namabaru')");

    if ($query) {
        $berhasil = true;
    }
}
?>




<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-1">
                <div class="card-header pb-0">
                    <h6>Authors Form</h6>
                    <form method="Post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label mx-3">Nama Calon</label>
                            <input class="form-control" name="nama_calon" type="text" value="" id="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="mx-3">Visi</label>
                            <input class="form-control" id="exampleFormControlSelect1" name="visi" type="">

                        </div>
                        <div class="form-group">
                            <label for="example-email-input" class="form-control-label mx-3">Misi</label>
                            <input class="form-control" name="misi" type="text" id="">
                        </div>
                        <div class="form-group">
                            <label for="example-url-input" class="form-control-label mx-3">Foto</label>
                            <input class="form-control" name="foto" type="file">

                        </div>

                        <div class="text-center mt-4 mb-3">
                            <button type="submit" class="btn btn-order btn-lg btn bg-gradient-primary">
                                <i class="fa-solid fa-paper-plane"></i></i>Input Data
                            </button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>

    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php if ($berhasil) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Input!',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = "calon_ketua.php";
        });
    </script>
<?php } ?>