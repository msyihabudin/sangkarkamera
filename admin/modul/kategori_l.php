<h3> <a href="kategori.php" class="folder"> Category Report </a></h3><hr>
<ul>
    <li><p><a class="button add" href="admin.php?p=kategori">Add new category</a></p></li>
</ul>
<div class="clearer"></div>

    <?php
    include_once("koneksi.php");
    include "lib/class_paging.php";
    koneksi();

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);
    
    //nama tabel
    $tabel = "kategori";
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel ORDER BY id DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <table>
        <thead>
        <tr>
            <th scope=col style="width: 25px;">No</th>
            <th scope=col style="width: 300px;">ID Kategori</th>
            <th scope=col>Kategori</th>
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
            <td><?php echo $data['id_kategori'];?></td>
            <td><?php echo $data['kategori'];?></td>

            <td>
                <a href="admin.php?p=kategori_c&id=<?php echo $data['id'];?>" class="table-icon archive" title=Cetak></a>
                <a href="admin.php?p=kategori_e&id=<?php echo $data['id'];?>" class="table-icon edit" title=Edit></a>
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
                $linkHalaman = $p->navHalaman3($_GET[halaman], $jmlhalaman);
            
                echo "Hal: $linkHalaman";
                ?>
            </td>
        </tr>
        </tbody> </table>