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
	<title> KANDANG KAMERA | Home </title>
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

	<div id="header-bottom">
		<div id="header-isi"> 
			<div id="panes">
				<?php
				//nama tabel
				$tabel = "barang";
	
				//perintah query utk mengambil data
				$query = "SELECT * FROM $tabel ORDER BY tanggal desc";
				$hasil = mysql_query($query);
				$data = mysql_fetch_array($hasil);

				$keterangan = $data['keterangan'];
				$potong_isi = substr($keterangan,0,150);
				?>
		      <div id="panes-isi"> <img src="img/image/<?php echo $data['photo'];?>">
		        <h5><?php echo $data['jenis'];?></h5><br>
		        <p><?php echo $potong_isi; ?> ...</p>
		      </div>
			  <div id="panes-isi">
				<p style="text-align:right; float:right; margin-top:165px;"><a href="product.php?p=detail&id='<?php echo mysql_real_escape_string($data['id']);?>'" class="button">More Info</a> <a href="troli_i.php?id='<?php echo $data['id'];?>'" class="button">Buy Now</a></p>
			  </div>
			</div> 
		</div>
	</div>

	<div id="content">
		<div id="content-atas">
			<div class="kotak1"><h1>Our Products</h1></div>
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
		<div class="clearer"></div>
		<div id="catalog">						
		      <ul>
		      	<?php
		      	
		      	while($data2=mysql_fetch_array($hasil)){	
		      	?>
		        <li><a href="product.php?p=detail&id='<?php echo mysql_real_escape_string($data2['id']);?>'"><img src="img/image/<?php echo $data2['photo'];?>" alt=""><strong><?php echo $data2['jenis'];?></strong><br>&nbsp;&nbsp;IDR&nbsp;<?php echo $data2['harga'];?><?php 
		        if ($data2['stok']== '0') {
		        	echo "<br><b class=\"out-stock\">Out of stock</b>";
		        } else {
		        	echo "<br><strong>Ready stock</strong>";
		        }
		        ?></a></li>
		        <?php } ?>
		      </ul>		    
		</div> 
	</div>

	<div class="clearer"></div>

	<?php include 'footer.php';?>
</div>
</body>
</html>