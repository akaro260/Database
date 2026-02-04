<?php
include "../header/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa='$id'");

if ($query) {
    header("Location: siswa.php?hapus=berhasil");// sesuaikan nama file halaman tabel
} else {
    echo "Gagal menghapus data";
}
?>
