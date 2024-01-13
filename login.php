<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>login pelanggan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/main.css">
</head>
<body>


<?php include 'menu.php'; ?>

<div class="limiter">
		<div class="container-login100" style="background-image: url('admin/assets/images/bonsai2.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="post">
					<div class="login100-form-avatar">
						<img src="admin/assets/images/logo3.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						BONSAI EMPIRE
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="email" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10 p-b-10">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="daftar.php">
							Buat Akun Baru
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="admin/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/js/main.js"></script>
<?php
// jk ada tombol login(tombol login ditekan)
if (isset($_POST["login"])) 
{

	$email = $_POST["email"];
	$password = $_POST["password"];
    // lakukan kuery ngecek akun di tabel pelanggan di db
	$ambil = $koneksi->query("SELECT * FROM pelanggan
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	// ngitung akun yg terambil
	$akunyangcocok = $ambil->num_rows;

	// jika 1 akun yang cocok, maka diloginkan
	if ($akunyangcocok==1)
	{
		//anda sekses login
		// mendapatkan akun dlm bentuk array
		$akun = $ambil->fetch_assoc();
		// simpan di sessiom pelanggan
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('anda sukses login');</script>";

		// jk sudah belanja
		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='index.php';</script>";
		}
	}	
	else
	{
		// anda gagal login
		echo "<script>alert('anda gagal login, periksa akun anda');</script>";
		echo "<script>location='login.php';</script>";
	}
}

?>







</body>
</html> 