<footer>
	<div id="footer">
		<div class="kotak1">
			<h3>Product Categories</h3>
		    <ul class="footer_links">
		    	<?php
				//nama tabel
				$tabel = "kategori";
	
				//perintah query utk mengambil data
				$query = "SELECT * FROM $tabel ORDER BY id desc";
				$hasil = mysql_query($query);
				while ($q = mysql_fetch_array($hasil)){
				?>
		      <li><a href="product.php?p=category&id=<?php echo mysql_real_escape_string($q['id']);?>"><?php echo $q['kategori'];?></a></li>
		      
		      <?php } ?>
		    </ul>
		</div>
		<div class="kotak1">
			<h3>Payments</h3>
		   	<div align="center">
			<span><img src="http://4.bp.blogspot.com/-B1Jjsl-3Aes/TV2uXNEVpOI/AAAAAAAABH0/2_dJQ3-v3Bo/s1600/logo-mandiri.png" width="120" /></span></div>
			<div style="text-align: center;">
			<span>No Rek : 199-999-9999</span></div>
			<div align="center" class="style69">
			A/N&nbsp;: Sangkar Kamera</div>
		</div>
		<div class="kotak1">
			<h3>Shipments</h3>
		    <div align="center">
			<span><img src="http://www.rajagrosirkosmetik.com/Image/JNE.jpg" width="150" /></span></div>
		</div>
		<div class="clearer"></div>
		<p> &copy;Copyright BSI 2014. All Right Reserved </p>
	</div>
	</footer>