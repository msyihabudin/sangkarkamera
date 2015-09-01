<?php
include_once("koneksi.php");
koneksi();

session_start();
if(!isset($_SESSION['transaksi'])){
    $idt = date("ymdHis");//membuat id transaksi yang unik berdasarkan waktu
    $_SESSION['transaksi'] = $idt;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> KANDANG KAMERA | Confirm Form </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">
	<div id="header-top">
	<div id="header-top-content"> 
		<div id="logo"> <a href="index.php"> <img src="img/taskamonline.png" width="300px"> </a> </div>
		<div id="menu">
			<?php include 'menu.php';?>
		</div>
	</div>
	</div>

	<div id="content">
		<div id="content-atas">
			<div class="kotak1"><h1>Contact Us</h1></div>
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
		<div id="detail">
		<div class="te">
			<form action="" method="POST">
			<table>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td width="200">Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" size="30"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="email" size="30"></td>
				</tr>
				<tr>
					<td>Subjek</td>
					<td>:</td>
					<td><input type="text" name="subjek" size="30"></td>
				</tr>
				<tr>
					<td valign="top">Pesan</td>
					<td valign="top">:</td>
					<td><textarea name="pesan" cols="40" rows="5"></textarea></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="submit" value="Kirim" class="button"></td>
				</tr>
			</table>
			</form>
		</div>
		<div class="te">
			<h3 align="right">CV. Sangkar Kamera</h3>
			<p align="right" style="text-indent:50px; font-size:15px;">
			Jl. Cut Mutiah No. 88 <br>
			Bekasi<br><br>
			Telp : 021-21212121<br>
			Email : team@sangkarkamera.com

			</p>
		</div>			
		</div>		     
	</div>

	<?php
	if (isset($_POST['submit'])) {
		$polaemail = "^.+@.+\.((com)|(net)|(org)|(co.id))$";

		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$subjek = $_POST['subjek'];
		$pesan = $_POST['pesan'];
		if (empty($nama)) {
			echo "<script>alert('Nama tidak boleh kosong !');</script>";
   			echo "<script>history.go(-1);</script>";
		} elseif (empty($email)) {
			echo "<script>alert('Email tidak boleh kosong !');</script>";
   			echo "<script>history.go(-1);</script>";
   		} elseif (!eregi($polaemail,$email)) {
			echo "<script>alert('Format email salah !');</script>";
   			echo "<script>history.go(-1);</script>";
		} elseif (empty($subjek)) {
			echo "<script>alert('Subjek tidak boleh kosong !');</script>";
   			echo "<script>history.go(-1);</script>";
		} elseif (empty($pesan)) {
			echo "<script>alert('Pesan tidak boleh kosong !');</script>";
   			echo "<script>history.go(-1);</script>";
		} else {
			mail("syihabudin@hotmail.co.id",$subjek,$pesan,$email);
			echo "<script>alert('Pesan Anda telah terkirim !');</script>";
   			echo "<script>history.go(-1);</script>";
		}
	}
	?>

	<div class="clearer"></div>

	<?php include 'footer.php';?>
</div>
</body>
</html>