<?php

include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tbl_calon_ketua WHERE id_calon='$id'");

if ($query) {
    header("Location: calon_ketua.php"); // sesuaikan nama file halaman tabel
} else {
    echo "Gagal menghapus data";
}
?>

