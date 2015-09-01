<div id="content-atas">
	<div class="kotak1"><h1>Confirm Here</h1></div>
	<div class="kotak2">
	<?php

	//tabel
	$tabelpesan = "tabelpesan";

	$idtransaksi = $_SESSION['transaksi'];
	$keranjangx = mysql_query("select * from $tabelpesan where idtransaksi='$idtransaksi'");
	$pesan = 0;
	while($psn = mysql_fetch_array($keranjangx)){
	    $pesan = $pesan + $psn['jumlah'];
	}
	?>
	<img border="0" src="img/cart-icon.png" align="left" width="64" height="64"><b><font size="6"><?php echo $pesan;?></font></b>
    Pesanan
	<br>
	<?php
	if($pesan>0){
	    echo "<a href=troli.php>[lihat]</a>";
	}
	?>
	</div>
	<div class="clearer"></div>
	<div class="kotak3"></div>
</div>
<div id="catalog">
	<p>Masukan no order anda untuk mengkonfirmasi pembayaran dibawah ini:</p>
	<form action="" method="POST">
		<input type="text" name="confirm" size="30"> &nbsp;&nbsp;&nbsp; <input type="submit" name="go" value="Confirm">
	</form>

	<?php

	if(isset($_POST['go'])) {
		$confirm = $_POST['confirm'];
		if ($confirm == '') {
			echo "<script>alert('Selamat Datang di menu Konfirmasi! Silahkan masukkan No Order Anda.');</script>";
   			echo "<script>history.go(-1);</script>";
		} else {
		$ketemu = mysql_fetch_array(mysql_query("SELECT * FROM pembayaran WHERE idtransaksi = '$confirm'"));
		if ($ketemu > 0) {

			if ($ketemu['status_pembayaran'] == "Sudah Konfirmasi" OR $ketemu['status_pembayaran'] == "Sudah Lunas") {
				echo "<h1 align=center> Pesanan Anda dengan No Order : <strong>$confirm</strong> telah dikonfirmasi.</h1>";
			} else {

			$sql = mysql_query("UPDATE pembayaran SET status_pembayaran = 'Sudah Konfirmasi' WHERE idtransaksi = '$confirm'");

			$r=mysql_fetch_array(mysql_query("SELECT * FROM tabelpesan, barang WHERE tabelpesan.id = barang.id AND tabelpesan.idtransaksi = '$confirm'"));

			echo "<h1 align=center> Terima kasih! Pesanan Anda dengan No Order : <strong>$r[idtransaksi]</strong> akan segera kami kirim.</h1>";

			}			
		} else {
			echo "<script>alert('No Order yang anda masukan salah !');</script>";
   			echo "<script>history.go(-1);</script>";
		}
		}

	}

	?>	
</div>