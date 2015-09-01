<h3 id="invoices"> <a href="" class="invoices"> Detail Invoice </a></h3><hr>        
<div class="clearer"></div>
<?php

include_once("koneksi.php");
include_once("lib/class_paging.php");
koneksi();
 
  $idtransaksi = $_GET['idtransaksi'];

  //tampilin data
  $t = mysql_fetch_array(mysql_query("SELECT * FROM detailpesan, kota WHERE detailpesan.id_kota = kota.id_kota AND idtransaksi = '$idtransaksi'"));
  
  ?>

  <table>
	<tr>
		<td width="100">Nama Lengkap</td>
		<td width="2">:</td>
		<td><?php echo $t['nama_pelanggan']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $t['alamat']; ?></td>
	</tr>
	<tr>
		<td>Telepon/Hp</td>
		<td>:</td>
		<td><?php echo $t['telepon']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $t['email']; ?></td>
	</tr>
	<tr>
		<td>Kota Tujuan</td>
		<td>:</td>
		<td><?php echo $t['nama_kota']; ?></td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td>Nomor Order</td>
		<td>:</td>
		<td><strong style="font-color:red"><?php echo $t['idtransaksi']; ?></strong></td>
	</tr>
  </table>
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
      echo "<tr><td><img src='../img/image/".$k['photo']."' width=50 height=50></td>
      <td align=center>".$k['id']."</td><td>".$k['jenis']."</td><td>".$k['merk']."</td>";
      echo "<td align=center>".$k['jumlah']."</td>";

      $harganya = $k['jumlah'] * $k['harga'];
      echo "<td>Rp. <span id=\"harga".$k['nomor']."\">$harganya</span> &nbsp;</td></tr>";

      $subtotal = $subtotal + $harganya;
    }
      echo "<tr><td colspan=5 align=right><b>Total</b> &nbsp;</td><td><b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>"; ?>
		<tr><td colspan=5 align=right><b>Ongkos Kirim</b> &nbsp;</td><td><b>Rp. <span id=subtotal><?php echo $t['ongkos_kirim']; ?></span></b></td></tr>
		<?php
		$total_bayar = $subtotal + $t['ongkos_kirim'];
		?>
		<tr><td colspan=5 align=right><b>Total Bayar</b> &nbsp;</td><td><b>Rp. <span id=subtotal><?php echo $total_bayar; ?></span></b></td></tr>
    </table>
    <div class="clearer"></div><br><br>