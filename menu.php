<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="admin/assets/css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="admin/assets/css/main.css">
	<link rel="stylesheet" href="admin/assets/css/style.css">
</head>
<body>
<nav class="nav navbar atas-2">
	<div class="container">
<div class="logo-form-avatar img">
		<ul class="nav navbar-nav">
		<li>
						<img src="admin/assets/images/logo.png" alt="AVATAR"></li>
			<li><a href="index.php" class="warna">Home</a></li>
			<li><a href="keranjang.php"class="warna">Keranjang</a></li>
			<!-- jk sudah login(ada session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])): ?>
            	<li><a href="riwayat.php"class="warna">Riwayat Belanja</a></li>
            	<li><a href="logout.php"class="warna">Logout</a></li>
			<!-- selainitu(blm login||blm ada session pelanggan) -->
			<?php else: ?>
				<li><a href="login.php"class="warna">Login</a></li>
				<li><a href="daftar.php"class="warna">Daftar</a></li>
			<?php endif ?>

			
			<li><a href="checkout.php"class="warna">Checkout</a></li>
		</ul>

		<form action="pencarian.php" method="get" class="navbar-form navbar-right">
			<input type="text" class="form-control" name="keyword">
			<button class="btn btn-primary">Cari</button>
		</form>
	</div>
</nav>
<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<!-- navbar -->
