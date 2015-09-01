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
          $idtransaksi = $_SESSION['transaksi'];

          $keranjang = mysql_query("select tabelpesan.*, barang.* from tabelpesan, barang where tabelpesan.idtransaksi='$idtransaksi' and tabelpesan.id=barang.id");
          $subtotal = 0;
          while($k = mysql_fetch_array($keranjang)){
            echo "<tr><td><img src='img/image/".$k['photo']."' width=50 height=50></td>
            <td>".$k['id']."</td><td><a href=\"product.php?p=detail&id='".mysql_real_escape_string($k['id'])."'\">".$k['jenis']."</a></td><td>".$k['merk']."</td>";
            echo "<td><input type=text size=1 value='".$k['jumlah']."' id=jumlah".$k['nomor'].">
            <a href=\"javascript:update(".$k['nomor'].")\" class=\"table-icon edit\">Update</a> <span id=\"loading".$k['nomor']."\"></span></td>";

            $harganya = $k['jumlah'] * $k['harga'];
            echo "<td>Rp. <span id=\"harga".$k['nomor']."\">$harganya</span> &nbsp;<a href=\"delete.php?id=".$k['nomor']."\" title=\"delete\"><img src=img/i_delete.png border=0></a></td></tr>";

            $subtotal = $subtotal + $harganya;
          }
          echo "<tr><td colspan=5 align=right><b>Total</b> &nbsp;</td><td><b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>";
          ?>
        </table>
        <div style="float:left"><a href="index.php" class="arrow_down">Continue Shopping</a></div>
        <div style="float:right"><a href="troli.php?p=finished&idtransaksi=<?php echo $idtransaksi;?>" class="coins">Finished Shopping</a></div>
        <div class="clearer"></div><br><br>
        <p>* Apabila Anda mengubah jumlah (Qty), jangan lupa tekan tombol <b>Update</b></p>
        <p>** Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat Selesai Belanja</p>     
</div>