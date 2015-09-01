<div id="content-atas">
	
	<div class="kotak2">
	<?php

	//tabel
	$tabelpesan = "tabelpesan";

	$idtransaksi = $_SESSION['transaksi'];
	$keranjangx = mysql_query("SELECT * FROM $tabelpesan WHERE idtransaksi='$idtransaksi'");
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
	<?php
	//get id
	$id = trim(strip_tags($_GET['id']));
		
	//nama tabel
	$tabel = "barang";
	$tabel2 = "kategori";

	//perintah query utk mengambil data
	$kategori = mysql_fetch_array(mysql_query("SELECT * FROM $tabel2 WHERE id = '$id'"));
	?>
	<div class="kotak1"><h1>Short by: <?php echo $kategori['kategori'];?></h1></div>
	<div class="clearer"></div>
	<div class="kotak3"></div>
</div>
<div id="catalog">		
	<ul>
	   	<?php

	   	

		$hasil2 = mysql_query("SELECT * FROM $tabel, $tabel2 WHERE $tabel.id_kategori = $tabel2.id_kategori and $tabel2.id_kategori = '$kategori[id_kategori]'");
	   	while($data2=mysql_fetch_array($hasil2)){
	   		$id=mysql_fetch_array(mysql_query("SELECT id, tanggal FROM $tabel WHERE tanggal='". $data2['tanggal'] ."'"));
	  	?>
	  	<li><a href="product.php?p=detail&id='<?php echo $id['id'];?>'"><img src="img/image/<?php echo $data2['photo'];?>" alt=""><strong><?php echo $data2['jenis'];?></strong><br>&nbsp;&nbsp;IDR&nbsp;<?php echo $data2['harga'];?><?php 
		        if ($data2['stok']== '0') {
		        	echo "<br><b class=\"out-stock\">Out of stock</b>";
		        } else {
		        	echo "<br><strong>Ready stock</strong>";
		        }
		        ?></a></li>
		        <?php } ?>
	</ul>
</div>