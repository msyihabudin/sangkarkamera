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
			<div class="kotak1"><h1>Our Story</h1></div>
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
		<div id="troli">
		<div class="te">
			<img src="img/1.png" width="350px">
		</div>
		<div class="te">
			<h3 align="center">What Is This ?</h3>
			<p align="justify" style="text-indent:50px; font-size:15px;">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
			</p>
		</div>			
		</div>		     
	</div>

	<div class="clearer"></div>

	<?php include 'footer.php';?>
</div>
</body>
</html>