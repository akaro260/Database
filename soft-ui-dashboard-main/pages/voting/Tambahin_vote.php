<?php
session_start();
include "../header/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_calon = $_POST['id_calon'];
    $tanggal = date('Y-m-d H:i:s');

    $insert = mysqli_query($koneksi, "
        INSERT INTO tbl_voting (id_calon, waktu_vote, id_nama)
        VALUES ('$id_calon', '$tanggal', 0)
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
