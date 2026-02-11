<?php
session_start();
include "../header/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_calon = $_POST['id_calon'];
    $tanggal = date('Y-m-d H:i:s');

    $insert = mysqli_query($koneksi, "
        INSERT INTO tbl_vote (id_calon, tanggal_vote, id_nama)
        VALUES ('$id_calon', '$tanggal', 0)
    ");

    header("Location: ../../../index.php");
    exit;
}
?>
