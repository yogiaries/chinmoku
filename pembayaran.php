<?php
session_start();
//koneksi ke database
include 'koneksi.php';


// jika tidak ada session pelanggan (blm login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}


// mendapatkan id_pembeli dri url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan is_pelanggan yg beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli)
{
	echo "<script>alert('Error');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<?php include 'menu.php'; ?>

	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>kirim bukti pembayaran Anda disini</p>
		<div class="alert alert-info">total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>


		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label>Total Pembelian</label>
				<input type="text" readonly value="<?php echo number_format($detpem["total_pembelian"]) ?>" class="form-control" name="bayar">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
	</div>

<?php
// jk ada tombol kirim
if (isset($_POST["kirim"]))
{
	// upload dulu bukti
	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("ymdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$bayar = $_POST["bayar"];
	$tanggal = date("Y-m-d");

	// simpan pembayaran
	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,bayar,tanggal,bukti)
		VALUES ('$idpem','$nama','$bank','$bayar','$tanggal','$namafiks') ");

	// update dong data pembeliannya dari pending menjadi sudah kirim pembayaran
	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' 
		WHERE id_pembelian='$idpem'");

	echo "<script>alert('terimaksih sudah mengirimkan bukti pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>

</body>
</html>