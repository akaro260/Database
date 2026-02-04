<?php
include "../header/koneksi.php";
include "../header/header.php";

$data = mysqli_query($koneksi, "SELECT * FROM tbl_calon_ketua");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Calon Ketua</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">📋 Daftar Calon Ketua</h5>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-hover align-middle text-center">
          <thead class="table-secondary">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Visi</th>
              <th>Misi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>

        <tbody>
            <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td class="fw-bold"><?= htmlspecialchars($d['nama_calon']) ?></td>
              <td><?= nl2br(htmlspecialchars($d['visi'])) ?></td>
              <td><?= nl2br(htmlspecialchars($d['misi'])) ?></td>
              <td>
                <?php if (!empty($d['foto'])) : ?>
                  <img src="foto_calon/<?= $d['foto'] ?>" width="80" class="rounded shadow">
                <?php else : ?>
                  <span class="text-muted">Tidak ada foto</span>
                <?php endif; ?>
              </td>

              <td>
                <a href="calon_ketua_edit.php?id=<?= $d['id_calon'] ?>" 
                  class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i> Edit
                </a>

                <a href="delete_ck.php?id=<?= $d['id_calon'] ?>" 
                  class="btn btn-sm btn-danger"
                  onclick="return confirm('Yakin mau hapus calon ini?')">
                  <i class="fas fa-trash"></i> Hapus
                </a>
              </td>
            </tr>
            <?php endwhile; ?>
        </tbody>

      </table>
    </div>
  </div>
</div>

</body>
</html>
