<?php
    include_once("koneksi.php");
    
    koneksi();

    session_start();

    //nama tabel
    $tabel = "user";
    $username = $_SESSION[namauser];
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel WHERE username = '$username'";
    $hasil=mysql_query($query);
    $i = 1;
    
    //cetak hasil query
    $data=mysql_fetch_array($hasil);
    ?>

<h3> <a href="produk.php" class="user"> My Profile </a></h3><hr>
<ul>
    <li><p><a class="useredit" href="admin.php?p=profil_e&id=<?php echo $data[id];?>">Edit My Profile</a></p></li>
</ul>        
<div class="clearer"></div>


    <table>
        <thead>
        <tr>
            <th scope=col>No</th>
            <th scope=col>Nama Lengkap</th>
            <th scope=col>Username</th>
            <th scope=col>Email</th>
            <th scope=col>Blokir</th>
            <th scope=col>Level</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align=center><?php echo $i;?></td>
            <td><?php echo $data['namalengkap'];?></td>
            <td><?php echo $data['username'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['blokir'];?></td>
            <td><?php echo $data['level'];?></td>
        </tr>
        <?php
        $i++;
        ?> 
        </tbody>
    </table>