<?php
include_once("koneksi.php");
koneksi();

$id=$_GET['idtransaksi'];

$delete = mysql_query("UPDATE pembayaran SET status_pembayaran = 'Sudah Lunas' WHERE idtransaksi = '$id'");

$delete = mysql_query("UPDATE detailpesan SET status_pesan = 'Sudah Dikirim' WHERE idtransaksi = '$id'");

if(mysql_affected_rows() > 0)
	{
	echo "<script>alert('Barang akan segera dikirim');</script>";
	echo "<script>history.go(-1);</script>";
	}
else
	{
	echo "<script>alert('Pengiriman barang gagal, coba ulangi lagi');</script>";
	echo "<script>history.go(-1);</script>";
	}
?>