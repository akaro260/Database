<?php
session_start();
include "soft-ui-dashboard-main/pages/header/koneksi.php";

$error = "";

if (isset($_POST['Username'])) {

	$username = $_POST['Username'];
	$pass = $_POST['pass'];

	// ambil data berdasarkan Username
	$query = mysqli_query(
		$koneksi,
		"SELECT * FROM tbl_siswa WHERE Username='$username'"
	);
if (mysqli_num_rows($query) == 1) {

    $data = mysqli_fetch_assoc($query);

    if ($pass == $data['password']) {

        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['Nama']; // huruf besar sesuai DB
        $_SESSION['id_siswa'] = $data['id_siswa'];

        echo "<script>
            alert('Login berhasil');
            window.location='index.php';
        </script>";

    } else {

        echo "<script>
            alert('Password salah');
            window.location='login.php';
        </script>";
    }

} else {

    echo "<script>
        alert('Username tidak ditemukan');
        window.location='login.php';
    </script>";
}

}
?>