<?php
 
  $idtransaksi = $_GET['idtransaksi'];
  $polaemail = "^.+@.+\.((com)|(net)|(org)|(co.id))$";
  $pola_tlp = "^[0-9]+$";

  if(isset($_POST['go'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $id_kota = $_POST['kota'];

    if ((!$nama)||(!$alamat)||(!eregi($pola_tlp,$telepon))||(!eregi($polaemail,$email))||(!$id_kota)){
      echo "<script>alert('Harap isi data dengan benar!');</script>";
      echo "<script>history.go(-1);</script>";
    } else {

    $input="INSERT INTO detailpesan (nama_pelanggan, alamat, telepon, email, tanggal_pesan, id_kota, idtransaksi)
            VALUES ('$nama', '$alamat', '$telepon', '$email', now(), '$id_kota', '$idtransaksi')";

    //kirim perintah query
    $query=mysql_query($input) or die ("Gagal".mysql_error());
	
	$pembayaran = "INSERT INTO pembayaran (idtransaksi) VALUES($idtransaksi)";
	$qry = mysql_query($pembayaran) or die ("Gagal.".mysql_error());
	}
  }
  
  //update stok
  $sql = mysql_query("SELECT * FROM barang, tabelpesan WHERE barang.id = tabelpesan.id AND tabelpesan.idtransaksi = '$idtransaksi'");
  while ($s = mysql_fetch_array($sql)){
	$stok = $s['stok'] - $s['jumlah'];
	$updatestok = mysql_query("UPDATE barang, tabelpesan SET barang.stok = '$stok' WHERE barang.id = tabelpesan.id AND tabelpesan.idtransaksi = '$idtransaksi'");
  }
  
  //Rusak sesi
  if ($_SESSION['transaksi'] == $idtransaksi) {
    error_reporting(0);
    session_start();

    unset($_SESSION['transaksi']);
  }

  //tampilin data
  $t = mysql_fetch_array(mysql_query("SELECT * FROM detailpesan, kota WHERE detailpesan.id_kota = kota.id_kota AND idtransaksi = '$idtransaksi'"));
  
  ?>
<div id="catalog">
<h2>INVOICE</h2>
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
		<td><strong style="font-color:red"><?php echo $t['idtransaksi']; ?></strong> *) Harap ingat NO ORDER anda.</td>
	</tr>
  </table>
  </div>

  <div id="troli">
      <!--kontennya di sini-->
      <img src=ajax-loader.gif style="display:none">
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
          echo "<tr><td colspan=5 align=right><b>Total</b> &nbsp;</td><td><b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>"; ?>
		  <tr><td colspan=5 align=right><b>Ongkos Kirim</b> &nbsp;</td><td><b>Rp. <span id=subtotal><?php echo $t['ongkos_kirim']; ?></span></b></td></tr>
		  <?php
		  $total_bayar = $subtotal + $t['ongkos_kirim'];
		  ?>
		  <tr><td colspan=5 align=right><b>Total Bayar</b> &nbsp;</td><td><b>Rp. <span id=subtotal><?php echo $total_bayar; ?></span></b></td></tr>
        </table>
        <div class="clearer"></div><br><br> 
		<h2>CARA PEMBAYARAN</h2>
		<ul>
			<li>Silahkan transfer ke Bank Mandiri dengan no rek. <b style="font-color:red">199-999-9999</b>. a/n Sangkar Kamera sejumlah <b>Rp. <?php echo $total_bayar; ?>,- </b></li>
			<li>Setelah Anda transfer kepada Kami silahkan confirm pembayaran dengan no order : <b><?php echo $t['idtransaksi']; ?></b> pada menu Confirm dihalaman website Kami.</li>
			<li>Setelah Anda mengkonfirmasi pembayaran maka kami akan kirim barang ke alamat Anda (dengan catatan transfer dari Anda sebelum pukul 5 sore).</li>
			<li>Jika dalam tenggang waktu 2 x 24 jam Anda tidak mentransfer, maka Kami anggap di <b>CANCEL</b>.</li>
			<li>Terima kasih atas kepercayaan Anda telah membeli Produk kami.</li>
		</ul>
  </div>