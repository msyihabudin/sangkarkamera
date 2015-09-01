<?php
include_once("koneksi.php");
koneksi();

$id=$_GET['idtransaksi'];

$delete = mysql_query("DELETE FROM tabelpesan WHERE idtransaksi = '$id'");

$delete2 = mysql_query("DELETE FROM detailpesan WHERE idtransaksi = '$id'");

$delete3 = mysql_query("DELETE FROM pembayaran WHERE idtransaksi = '$id'");


if(mysql_affected_rows() > 0)
	{
	echo "<script>alert('Record telah dihapus');</script>";
	echo "<script>history.go(-1);</script>";
	}
else
	{
	echo "<script>alert('Penghapusan record gagal, coba ulangi lagi');</script>";
	echo "<script>history.go(-1);</script>";
	}
?>