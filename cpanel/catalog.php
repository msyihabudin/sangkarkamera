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
<div id="catalog">		
	<ul>
	   	<?php
	   		
		//nama tabel
		$tabel = "barang";

	   	$query = "SELECT * FROM $tabel ORDER BY id DESC";
		$hasil = mysql_query($query);
	   	while($data2=mysql_fetch_array($hasil)){	
	  	?>
	    <li><a href="product.php?p=detail&id='<?php echo mysql_real_escape_string($data2['id']);?>'"><img src="img/image/<?php echo $data2['photo'];?>" alt=""><strong><?php echo $data2['jenis'];?></strong><br>&nbsp;&nbsp;IDR&nbsp;<?php echo $data2['harga'];?>
	    <?php 
		    if ($data2['stok']== '0') {
		       	echo "<br><b class=\"out-stock\">Out of stock</b>";
		    } else {
		       	echo "<br><strong>Ready stock</strong>";
		    }
		    ?></a></li>
		    <?php } ?>
	</ul>
</div>