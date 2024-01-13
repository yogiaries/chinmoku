<?php
$koneksi = new mysqli("localhost","root","","xmuzicstore"); 
$hapus=mysqli_query($koneksi,"delete from pembelian where id_pembelian='$_GET[id]'");

echo "<script>alert('Riwayat Terhapus');</script>";
echo "<script>location='riwayat.php';</script>";
?>