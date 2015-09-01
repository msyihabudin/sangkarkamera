<div id="detail">
	<div id="content-atas">
			<div class="kotak1"><h1>Product Detail</h1></div>
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

	<?php
	
	//ambil id_produk
	$id = trim(strip_tags($_GET['id']));

	//nama tabel
	$tabel = "barang";
	$tabel2 = "kategori";
	
	//perintah query utk mengambil data
	$query = "SELECT * FROM $tabel WHERE id=$id";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil) or die ("error bro!! <br>".mysql_error());
	?>
	<div id="detail-isi"> <img src="img/image/<?php echo $data['photo'];?>">
		<table border="0">
			<tr>
				<th colspan="3" align="left"><h5><?php echo $data['jenis'];?></h5></th>
			</tr>
			<tr>
				<td>Merk</td>
				<td>:</td>
				<td width="300px"><?php echo $data['merk'];?></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td>:</td>
				<td><?php echo $data['stok'];?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td>IDR <?php echo $data['harga'];?></td>
			</tr>
			<?php

			//perintah query utk mengambil data
			$query2 = "SELECT * FROM $tabel, $tabel2 WHERE $tabel.id_kategori=$tabel2.id_kategori AND $tabel.id_kategori='$data[id_kategori]'";
			$hasil2 = mysql_query($query2);
			$data2 = mysql_fetch_array($hasil2);
			?>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td><?php echo $data2['kategori'];?></td>
			</tr>
			<tr>
				<td colspan="3">
					<p style="text-align:left;">
						<?php
						if ($data['stok']=='0') {
							echo "<a href=\"#\" class=\"button2\">Out of stock</a>";
						} else {
							echo "<a href=\"troli_i.php?id='$data[id]'\" class=\"button\">Buy Now</a>";
						}
						?>
					
					</p>
				</td>
			</tr>
		</table>
	    <p><?php echo $data['keterangan']; ?></p><br><br><br><br>
	</div>				
</div>