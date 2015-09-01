<h3 id="addorder"> <a href="" class="addorder"> New Order </a></h3><hr>        
<div class="clearer"></div>

<?php
    include_once("koneksi.php");
    include_once("lib/class_paging.php");
    koneksi();

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);

    //nama tabel
    $tabel = "detailpesan";
    $tabel2 = "pembayaran";
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel, $tabel2 WHERE $tabel.idtransaksi = $tabel2.idtransaksi AND $tabel2.status_pembayaran != 'Sudah Lunas' ORDER BY $tabel.tanggal_pesan DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <p>* ) Jika dalam waktu 2 X 24 Jam Pelanggan belum melunasi pembayaran. Maka pesanan di CANCEL.</p>
    <table>
        <thead>
        <tr>
            <th scope=col>No</th>
            <th scope=col>ID Transaksi</th>
            <th scope=col style="width: 100px;">Nama Pelanggan</th>
			<th scope=col>Alamat</th>
            <th scope=col>Tanggal Pesanan</th>
            <th scope=col>Status Pembayaran</th>
            <th scope=col>Status Pesanan</th>
            <th scope=col style="width: 45px;">Modify</th>
        </tr>
        </thead>
        <tbody>
    <?php
    //cetak hasil query
    while ($data=mysql_fetch_array($hasil))
        {
    
    ?>
        <tr>
            <td align=center><?php echo $i;?></td>
            <td><?php echo $data['idtransaksi'];?></td>
            <td><?php echo $data['nama_pelanggan'];?></td>
            <td><?php echo $data['alamat'];?></td>
            <td align="center"><?php echo $data['tanggal_pesan'];?></td>
            <td align="center">
                <?php
                if ($data['status_pembayaran']=="Belum Lunas") {
                    echo "<b class=\"blm-lunas\">$data[status_pembayaran]</b>";
                } else {
                    echo "<b class=\"konfir\">$data[status_pembayaran]</b>";
                }
                ?>
                
            </td>
            <td align="center"><?php echo $data['status_pesan'];?></td>

            <td>
                <a href="admin.php?p=kirim&idtransaksi=<?php echo $data[idtransaksi];?>" class="table-icon kirim" title="Kirim"></a>
                <a href="admin.php?p=cancel&idtransaksi=<?php echo $data[idtransaksi];?>&tabel=<?php echo $tabel;?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $data[idtransaksi];?> ?')" class="table-icon delete" title="Cancel"></a>
            </td>
        </tr>
        <?php
        $i++;
        } ?> 
        <tr align="left">
            <td colspan="9" align="left">
                <?php
                $jmldata = mysql_num_rows(mysql_query("SELECT * FROM $tabel"));
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
            
                echo "Hal: $linkHalaman";
                ?>
            </td>
        </tr>
        </tbody>