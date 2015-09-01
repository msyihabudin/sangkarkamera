<h3 id="report"> <a href="" class="report"> Sales Report </a></h3><hr>        
<div class="clearer"></div>

<?php
    include_once("koneksi.php");
    koneksi();
    
    //perintah query utk mengambil data
    $sales = mysql_result(mysql_query("SELECT SUM(tabelpesan.harga) FROM tabelpesan, pembayaran WHERE tabelpesan.idtransaksi = pembayaran.idtransaksi AND pembayaran.status_pembayaran = 'Sudah Lunas'"), 0);

    $sales2 = mysql_result(mysql_query("SELECT SUM( tabelpesan.jumlah ) FROM tabelpesan, pembayaran WHERE tabelpesan.idtransaksi = pembayaran.idtransaksi AND pembayaran.status_pembayaran = 'Sudah Lunas'"), 0);
?>

<h3 align="center">Laporan Saldo Yang Masuk ke Rekening CV. Sangkar Kamera : Rp. <?php echo $sales;?> ,-</h3>
<h3 align="center">Jumlah Produk Yang Berhasil Terjual : <?php echo $sales2;?> </h3>