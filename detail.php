<?php session_start(); ?>
<?php include 'koneksi.php' ?>
<?php
// mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

//echo "<pre>";
//print_r($detail);
//echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>detail produk</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/style.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="kontent">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h2 class="produk"><?php echo $detail["nama_produk"] ?></h2>
				<h4 class="harga">Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>

				<h5 class="stok">Stok: <?php echo $detail['stok_produk'] ?></h5>

				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" placeholder="Jumlah Beli" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Beli</button>
							</div>
						</div>
					</div>
				</form>

				<?php
				// jk ada tombol beli
				if (isset($_POST["beli"]))
				{
					// mendapatkan jumlah yg diinputkan
					$jumlah = $_POST["jumlah"];
					// masukan di keranjang belanja
					$_SESSION["keranjang"]["$id_produk"] = $jumlah;

					echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>

				<p><?php echo $detail["deskripsi_produk"]; ?></p>
			</div>
		</div>
	</div>
</section>




</body>
</html>