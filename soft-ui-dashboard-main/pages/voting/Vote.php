<?php
session_start();
include "../header/koneksi.php";

// proteksi login
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

// ambil data calon
$calon = mysqli_query($koneksi, "SELECT * FROM tbl_calon_ketua");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Voting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="text-center mb-4">Pilih Calon Ketua</h3>

  <form action="proses_vote.php" method="POST">
    <?php while ($c = mysqli_fetch_assoc($calon)): ?>
      <div class="card mb-3">
        <div class="card-body">
          <input type="radio" name="id_calon" value="<?= $c['id_calon']; ?>" required>
          <strong><?= $c['nama_calon']; ?></strong>
        </div>
      </div>
    <?php endwhile; ?>

    <button type="submit" class="btn btn-success w-100">
      Kirim Vote
    </button>
  </form>
</div>

</body>
</html>
