<h3> <a href="#" class="user"> User Group </a></h3><hr>
<ul>
    <li><p><a class="add" href="admin.php?p=user">Add new user</a></p></li>
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
    $tabel = "user";
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel ORDER BY id DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <table>
        <thead>
        <tr>
            <th scope=col>No</th>
            <th scope=col>Nama Lengkap</th>
            <th scope=col>Username</th>
            <th scope=col>Email</th>
            <th scope=col>Blokir</th>
            <th scope=col>Level</th>
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
            <td><?php echo $data['namalengkap'];?></td>
            <td><?php echo $data['username'];?></td>
            <td><?php echo $data['email'];?></td>
            <td align="center"><?php echo $data['blokir'];?></td>
            <td><?php echo $data['level'];?></td>
            <td>
                <a href="admin.php?p=user_e&id=<?php echo $data[id];?>" class="table-icon user_edit" title="Edit"></a>
                <?php
                if ($data['blokir'] == 'N') {
                    echo "<a href=\"admin.php?p=user_n&id=$data[id]\" name=\"blokir\" class=\"table-icon user_delete\" title=\"Blokir\"></a>";
                } else if ($data['blokir'] == 'Y') {
                    echo "<a href=\"admin.php?p=user_y&id=$data[id]\" name=\"blokir\" class=\"table-icon unblokir\" title=\"Unblokir\"></a>";
                }
                ?>
                
                <a href="admin.php?p=delete&id=<?php echo $data[id];?>&tabel=<?php echo $tabel;?>" onClick="return confirm('Anda yakin ingin menghapus user: <?php echo $data[namalengkap];?> ?')" class="table-icon delete" title="Delete"></a>
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