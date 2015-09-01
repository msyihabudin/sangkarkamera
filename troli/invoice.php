<?php
include_once ("koneksi.php");

koneksi();

include('class.php');

$table = "detailpesan";
$idtransaksi = $_GET['idtransaksi'];
$ongkir = $_POST['ongkir'];

if(isset($_POST['proses'])){
  if ($ongkir == '') {
    echo "<script>alert('Anda harus memilih layanan pengiriman!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {

  }
}

$r=mysql_fetch_array(mysql_query("select * from $table where idtransaksi='$idtransaksi'"));

?>
<div id="catalog">
  <table>
    <tr>
      <th colspan="3">DATA PEMBELI</th>
    </tr>
    <tr>
      <td width="100">Nama Lengkap</td>
      <td width="2">:</td>
      <td><?php echo $r['nama']; ?></td>
    </tr>
	  <tr>
		  <td>Alamat</td>
		  <td>:</td>
		  <td><?php echo $r['alamat']; ?></td>
	  </tr>
	  <tr>
	  	<td>Telepon/Hp</td>
  		<td>:</td>
  		<td><?php echo $r['telepon']; ?></td>
	  </tr>
	  <tr>
	  	<td>Email</td>
	  	<td>:</td>
	  	<td><?php echo $r['email']; ?></td>
	  </tr>
	  <tr>
	  	<td>Kota Tujuan</td>
	  	<td>:</td>
	  	<td><?php echo $r['to']; ?></td>
	  </tr>
    <tr>
      <td colspan="3"></td>
    </tr>
    <tr>
      <td colspan="3">Nomor Order Anda : <?php echo $r['id_pesan'];?></td>
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
          echo "<tr><td colspan=5 align=right><b>Total</b> &nbsp;</td><td><b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>";
          ?>
        </table>
        <div style="float:left"></div>
        <div style="float:right;"><a href="troli.php?p=detail-finished&idtransaksi=<?php echo $idtransaksi;?>"><input type="submit" name="go" value="&nbsp;Proses&nbsp;" class="button"></a></div>
        <div class="clearer"></div><br><br>   
</div>