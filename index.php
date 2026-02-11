<?php
session_start();
include "soft-ui-dashboard-main/pages/header/koneksi.php";
$calon = mysqli_query($koneksi, "SELECT * FROM tbl_calon_ketua");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - QuickStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">QuickStart</h1>
      </a>

      <nav id="navmenu" class="navmenu"> <!--  -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
  </header>

  <main class="main bg-light">

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section id="hero" class="hero section py-5 bg-light">

      <div class="container text-center">
        <h1 class="mb-3 fw-bold" data-aos="fade-up">
          Voting <span class="text-primary">Ketua Sekarang</span>
        </h1>
        <p class="mb-5 text-muted" data-aos="fade-up" data-aos-delay="100">
          Pilih kandidat terbaik pilihanmu
        </p>

        <form action="soft-ui-dashboard-main/pages/voting/Tambahin_vote.php" method="POST" id="formvote">
          <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($calon)) {
              ?>
              <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="card calon-card shadow-lg  rounded-4 h-100 position-relative "
                  onclick="pilihCalon(<?= $data['id_calon'] ?>, this)" style="cursor:pointer;">
                  <!-- Nomor -->
                  <span class="position-absolute top-0 start-0 m-3 badge bg-primary fs-6">
                    No <?= $no++; ?>
                  </span>
                  <!-- Foto -->
                  <img src="soft-ui-dashboard-main/assets/img/<?= $data['foto']; ?>" class="card-img-top rounded-top-4"
                    style="height:400px; object-fit:cover;" alt="<?= $data['nama_calon']; ?>">
                  <div class="card-body text-center">
                    <h5 class="fw-bold"><?= $data['nama_calon']; ?></h5>
                    <p class="text-muted"><?= $data['kelas']; ?></p>
                    <p class="small">
                      <?= $data['visi']; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          
          <div class="text-center">
            <input type="hidden" name="id_calon" id="id_calon">
            <button type="submit" class="btn btn-success w-50 mt-3 rounded-pill" data-aos="zoom-in" id="btnPILIH"
              name="btnPILIH" disabled>
              Vote Sekarang
            </button>

          </div>
        </form>

    </section>

    <!-- /Hero Section -->



  </main>




  <!-- More Features Section -->


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
function pilihCalon(id_calon, card) {
  // isi hidden input
  document.getElementById('id_calon').value = id_calon;

  // aktifkan tombol
  document.getElementById('btnPILIH').disabled = false;

  // hapus border dari semua card
  let semuaCard = document.querySelectorAll('.calon-card');
  semuaCard.forEach(function(c){
    c.classList.remove('border-primary', 'border-info');
  });

  // beri border ke card yang dipilih
  card.classList.add('border-primary', 'border-3');
}
  </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['vote_sukses'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Voting kamu berhasil disimpan!',
    confirmButtonColor: '#198754'
});
</script>
<?php 
unset($_SESSION['vote_sukses']); 
endif; ?>

<?php if (isset($_SESSION['vote_error'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: 'Voting gagal disimpan!',
});
</script>
<?php 
unset($_SESSION['vote_error']); 
endif; ?>

</body>

</html>