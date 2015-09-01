<?php
include_once("koneksi.php");
koneksi();

$id = $_GET['id'];
$jml = $_GET['jml'];
$harga = mysql_query("select barang.harga, barang.stok from barang, tabelpesan where barang.id=tabelpesan.id and tabelpesan.nomor=$id");
$h = mysql_fetch_array($harga);
$harganya = $h['harga'];
$hargabaru = $harganya*$jml;

$stok = $h['stok'];
if ($jml <= $stok) {
	$update = mysql_query("update tabelpesan set jumlah=$jml, harga=$hargabaru where nomor=$id");
	if($update){
	    $ambil = mysql_query("select harga from tabelpesan where nomor=$id");
	    $a = mysql_fetch_array($ambil);
	    echo $a['harga'];
	}else{
	    echo "error";
	}
} else {
	echo "Jumlah melebihi stok !";
}


?>
