<h3> <a href="kota.php" class="folder"> City Report </a></h3><hr>
<ul>
    <li><p><a class="button add" href="admin.php?p=kota">Add new city</a></p></li>
</ul>
<div class="clearer"></div>

    <?php
    include_once("koneksi.php");
    include "lib/class_paging.php";
    koneksi();

    $p = new Paging;
    $batas = 20;
    $posisi = $p->cariPosisi($batas);
    
    //nama tabel
    $tabel = "kota";
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel ORDER BY id_kota DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <table>
        <thead>
        <tr>
            <th scope=col style="width: 25px;">No</th>
            <th scope=col style="width: 200px;">ID Kota</th>
            <th scope=col>Nama Kota</th>
            <th scope=col style="width: 150px;">Ongkos Kirim</th>
            <th scope=col style="width: 65px;">Modify</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //cetak hasil query
        while ($data=mysql_fetch_array($hasil)){
        ?>
        
        <tr>
            <td align=center><?php echo $i;?></td>
            <td><?php echo $data['id_kota'];?></td>
            <td><?php echo $data['nama_kota'];?></td>
            <td>Rp. <?php echo $data['ongkos_kirim'];?>,-</td>

            <td>
                <a href="admin.php?p=kota_c&id=<?php echo $data['id'];?>" class="table-icon archive" title=Cetak></a>
                <a href="admin.php?p=kota_e&id=<?php echo $data['id'];?>" class="table-icon edit" title=Edit></a>
                <a href="admin.php?p=delete&id=<?php echo $data['id'];?>&tabel=<?php echo $tabel;?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $data[kategori]; ?> ?')" class="table-icon delete" title=Delete></a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
        <tr>
            <td colspan=4>
                <?php
                $jmldata = mysql_num_rows(mysql_query("SELECT * FROM $tabel"));
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
            
                echo "Hal: $linkHalaman";
                ?>
            </td>
        </tr>
        </tbody> </table>