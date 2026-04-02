<?php
session_start();
include "../header/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_calon = $_POST['id_calon'];
    $tanggal = date('Y-m-d H:i:s');
    $id_siswa = $_SESSION['id_siswa'];


    $insert = mysqli_query($koneksi, "
        INSERT INTO tbl_voting (id_calon, waktu_vote, id_siswa)
        VALUES ('$id_calon', '$tanggal', $id_siswa)
    ");

    if ($insert) {
        $_SESSION['vote_sukses'] = true;
    } else {
        $_SESSION['vote_error'] = true;
    }

    header("Location: ../../../index.php");
    exit;
}
?>
