<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>daftar</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
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
						<input class="input100" type="text" name="nama" placeholder="Nama">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						</span>
					</div>
					

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Alamat is required">
						<input class="input100" type="text" name="alamat" placeholder="Alamat">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-address-book" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Alamat is required">
						<input class="input100" type="text" name="telepon" placeholder="Nomor Telfon">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10 p-b-10" >
						<button class="login100-form-btn" name="daftar">
							Daftar
						</button>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="login.php">
							Login
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
	<script src="admin/assets/js/main.js"></script>**
						<?php
						// jk ada tombol daftar(ditekan tombol daftar)
						if (isset($_POST["daftar"]))
						{
							// mengambil isian nama,email,password,alamat,telepon
							$nama = $_POST["nama"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$alamat = $_POST["alamat"];
							$telepon = $_POST["telepon"];

							//cek apakah email sudah digunakan
							$ambil = $koneksi->query("SELECT*FROM pelanggan
								WHERE email_pelanggan='$email'");
							$yangcocok = $ambil->num_rows;
							if ($yangcocok==1)
							{
								echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
								echo "<script>location='daftar.php';</script>";
							}
							else
							{
								//query insert ke tabel pelanggan
								$koneksi->query("INSERT INTO pelanggan
									(email_pelanggan,password_pelanggan,nama_pelanggan,
									telepon_pelanggan,alamat_pelanggan)
									VALUES('$email','$password','$nama','$telepon','$alamat') ");

								echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
								echo "<script>location='login.php';</script>";

							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>