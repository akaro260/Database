<?php
session_start();
include "koneksi.php";

// Bersihkan input
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Debug - uncomment untuk melihat nilai yang diterima
// echo "Username: $username | Password: $password | MD5: " . md5($password);

// Gunakan prepared statement untuk keamanan
$username_escaped = mysqli_real_escape_string($koneksi, $username);
$password_md5 = md5($password);

$query = mysqli_query($koneksi, "
  SELECT * FROM tbl_admin 
  WHERE Username='$username_escaped' 
  AND Password='$password_md5'
");

// DEBUG - LIHAT INI UNTUK TROUBLESHOOT

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['Username'];
    $_SESSION['Password'] = $data['Password'];
    

    
    // Redirect setelah 2 detik
    header("Refresh: 0.5; url=tambah_admin.php");
} else {
    echo "<h3>DATA DI DATABASE:</h3>";
    $query_all = mysqli_query($koneksi, "SELECT Username, Password FROM tbl_admin");
    while($row = mysqli_fetch_assoc($query_all)) {
        echo "DB Username: " . htmlspecialchars($row['Username']) . " | DB Password: " . htmlspecialchars($row['Password']) . "<br>";
    }
}
