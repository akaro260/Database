<?php
session_start();
include 'soft-ui-dashboard-main/pages/header/koneksi.php';

if (isset($_POST['log_in'])) {

  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $admin = mysqli_query(
    $koneksi,
    "SELECT * FROM tbl_admin WHERE Username='$user' AND Password='$pass'"
  );

  if (mysqli_num_rows($admin) > 0) {

    $data = mysqli_fetch_assoc($admin);

    $_SESSION['login'] = true;
    $_SESSION['role'] = 'admin';
    $_SESSION['id_admin'] = $data['id_admin'];   // ⭐ WAJIB
    $_SESSION['username'] = $data['Username'];   // optional
    $_SESSION['foto'] = $data['foto'];           // optional

    header("Location: soft-ui-dashboard-main/pages/dashboard/dashborad.php");
    exit;

  } else {
    echo "Login gagal";
  }
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    min-height: 100vh;
  }

  .card {
    border-radius: 15px;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets_login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets_login/css/main.css">
	<!--===============================================================================================-->
</head>
<?php if (isset($error)): ?>
        <div class="alert alert-danger text-center">
          Username / NIS atau Password salah
        </div>
      <?php endif; ?>
<body style="background: linear-gradient(135deg, #4e73df, #1cc88a);">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
      				<div class="login100-more" style="
		background-image: url('assets_login/images/vote.png');
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-color: #ffffff;
	">
				</div>
				<form class="login100-form validate-form" method="POST" >

					<!-- Logo -->
					<div class="text-center p-b-30">
						<h3 style="color:#333; font-weight:bold;">
							Sistem E-Voting
						</h3>
						<span style="font-size:14px;">Login Admin</span>
					</div>

					<!-- Username -->
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="user" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>

					<!-- Password -->
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<!-- Remember + Forgot -->

					<!-- Button -->
					<div class="container-login100-form-btn py-4">
					<button class="login100-form-btn btn btn-primary" 
        type="submit" 
        name="log_in">
    Login to see
</button>

					</div>

				</form>

				<!-- Background kanan -->



			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets_login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="assets_login/js/main.js"></script>

</body>

</html>