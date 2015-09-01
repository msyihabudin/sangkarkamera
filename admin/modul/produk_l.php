<h3 id="addproduct"> <a href="produk.php" class="cart"> Product Report </a></h3><hr>
<ul>
    <li><p><a class="add" href="admin.php?p=produk">Add new product</a></p></li>
    <li><p><a class="folder" href="admin.php?p=kategori_l">Categories</a></p></li>
</ul>        
<div class="clearer"></div>

<?php
    include_once("koneksi.php");
    include_once("lib/class_paging.php");
    koneksi();

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);

    //nama tabel
    $tabel = "barang";
    $tabel2 = "kategori";
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel ORDER BY tanggal DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <table>
        <thead>
        <tr>
            <th scope=col>No</th>
            <th scope=col>Photo</th>
            <th scope=col style="width: 250px;">Jenis</th>
            <th scope=col>Merk</th>
            <th scope=col>Kategori</th>
            <th scope=col>Stok</th>
            <th scope=col>Harga</th>
            <th scope=col style="width: 90px;">Tanggal & Waktu</th>
            <th scope=col style="width: 65px;">Modify</th>
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
            <td><img src="../img/image/<?php echo $data['photo'];?>" width="50px" height="50px"></td>
            <td><?php echo $data['jenis'];?></td>
            <td><?php echo $data['merk'];?></td>
            <td align="center"><?php echo $data['id_kategori'];?></td>
            <td align="center"><?php echo $data['stok'];?></td>
            <td>Rp. <?php echo $data['harga'];?>,-</td>
            <td><?php echo $data['tanggal'];?></td>

            <td>
                <a href="admin.php?p=produk_c&id=<?php echo $data[id];?>" class="table-icon archive" title="Cetak"></a>
                <a href="admin.php?p=produk_e&id=<?php echo $data[id];?>" class="table-icon edit" title="Edit"></a>
                <a href="admin.php?p=delete&id=<?php echo $data[id];?>&tabel=<?php echo $tabel;?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $data[jenis];?> ?')" class="table-icon delete" title="Delete"></a>
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