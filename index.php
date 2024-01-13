<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>BONSAI EMPIRE</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/style.css">
</head>
<body>


<?php include 'menu.php'; ?>
	<div class="container">
<!-- konten -->
<section class="konten">

	<div class="container">

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			
			<div class="col-md-3">
				<div class="thumbnail card " style="height: 270px;">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt style="
    height: 160px;" >
					<div class="caption">
				<h3 class="desc-produk" style= "text-align:center"><?php echo $perproduk['nama_produk']; ?></h3>
						<h5 class="desc-harga" style= "text-align:center">Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary desc-beli" >Beli</a>
						
					</div>
				</div>
			</div>
		    <?php } ?>



		</div>
	</div>
</section>

</body>
</html>