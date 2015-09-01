<?php
$idtransaksi = $_GET['idtransaksi'];
?>
<div id="catalog">
  <form action="troli.php?p=detail-finished&idtransaksi=<?php echo $idtransaksi;?>" method="POST">
  <table>
	<tr>
		<td width="100">Nama Lengkap</td>
		<td width="2">:</td>
		<td><input name="nama" id="nama" type="text" /></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><textarea name="alamat" cols="30"></textarea></td>
	</tr>
	<tr>
		<td>Telepon/Hp</td>
		<td>:</td>
		<td><input name="telepon" id="telepon" type="text" /></textarea></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td></label><input name="email" id="email" type="text" /></td>
	</tr>
	<tr>
		<td>Kota Tujuan</td>
		<td>:</td>
		<td>
		<select name="kota">
			<option value=""> Pilih Kota </option>
			<?php
			$sql = mysql_query("SELECT * FROM kota ORDER BY nama_kota ASC");
				  while($j=mysql_fetch_array($sql)){
					echo"<option value=$j[id_kota]>$j[nama_kota]</option> \n";
				  }		
			?>
		</select>
		</td>
	</tr>
  </table>
</div>
<div id="troli">
  
      <!--kontennya di sini-->
      <p>
        <table width="900px">
          <tr>
            <th scope=col></td>
            <th scope=col><b>Kode</b></td>
            <th scope=col style="width: 280px;"><b>Jenis</b></td>
            <th scope=col style="width: 100px;"><b>Merk</b></td>  
            <th scope=col style="width: 150px;"><b>Jumlah</b></td>
            <th scope=col style="width: 120px;"><b>Sub Total</b></td>
          </tr>

          <?php

          $keranjang = mysql_query("select tabelpesan.*, barang.* from tabelpesan, barang where tabelpesan.idtransaksi='$idtransaksi' and tabelpesan.id=barang.id");
          $subtotal = 0;
          while($k = mysql_fetch_array($keranjang)){
            echo "<tr><td><img src='img/image/".$k['photo']."' width=50 height=50></td>
            <td align=center>".$k['id']."</td><td>".$k['jenis']."</td><td>".$k['merk']."</td>";
            echo "<td align=center>".$k['jumlah']."</td>";

            $harganya = $k['jumlah'] * $k['harga'];
            echo "<td>Rp. <span id=\"harga".$k['nomor']."\">$harganya</span> &nbsp;</td></tr>";

            $subtotal = $subtotal + $harganya;
          }
          echo "<tr><td colspan=5 align=right><b>Total</b> &nbsp;</td><td><b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>";
          ?>
        </table>
        <div style="float:left"><input type="button" name="back" value="&nbsp;&nbsp;&nbsp;Back" class="button" onclick="self.history.back()"></div>
        <div style="float:right;"><a href="troli.php?p=detail-finished&idtransaksi=<?php echo $idtransaksi;?>"><input type="submit" name="go" value="Process" class="button"></a></div>
        <div class="clearer"></div><br><br>  
  </form> 
</div>