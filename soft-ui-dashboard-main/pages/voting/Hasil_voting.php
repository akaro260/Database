<?php
include "../header/koneksi.php";
include "../header/header.php";

$query = mysqli_query($koneksi, "SELECT * FROM tbl_calon_ketua ORDER BY jumlah_suara DESC");
?>

<div class="container-fluid py-4">

  <div class="row">
    <div class="col-12">

      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Hasil Voting</h6>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-3">

            <table class="table align-items-center mb-0 ">
              <thead>
                <tr>
                  <thead>
                    <tr>
                      <th class="px-3">No</th>
                      <th>Nama Calon</th>
                      <th class="text-center">Jumlah Suara</th>
                    </tr>
                  </thead>

                </tr>
              </thead>

              <tbody class="align-items-center mb-0">
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                  ?>
                  <tr>
                    <td class=""><?= $no++; ?></td>
                    <td class=""><?= $data['nama_calon']; ?></td>
                    <td class="text-center">
                      <span class="badge bg-success">
                        <?= $data['jumlah_suara']; ?>
                      </span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>

            </table>

          </div>
        </div>
      </div>

    </div>
  </div>

</div>