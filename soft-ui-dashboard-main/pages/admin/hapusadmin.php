<?php
include "../header/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tbl_admin WHERE id_admin='$id'");

if ($query) {
    header("Location: edit_admin.php"); // sesuaikan nama file halaman tabel
} else {
    echo "Gagal menghapus data";
}
?>
