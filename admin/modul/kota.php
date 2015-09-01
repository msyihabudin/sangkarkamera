<?php
error_reporting(0);
include_once ("koneksi.php");

koneksi();
//nama tabel
$tabel = "kota";

include "lib/inc.librari.php";

$auto = kdauto($tabel,"CTY");

?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='tambah'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Ditambahkan ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=kota_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Ditambahkan !</p></div>";
        }
        ?>
    </div>
</center>
<h3 id="addcity"> <a href="kota.php" class="folder"> Add City </a></h3><hr>
    <form id="form" action="admin.php?p=kota_t" method="post" enctype="multipart/form-data">
        <fieldset id="personal">
            <legend>CITY INFORMATION</legend>
            <label for="id_kota">ID Kota : </label>
            <input id="id_kota" name="id_kota" type="text" value="<?php echo $auto; ?>" disabled="disabled"/>
            <input id="id_kota" name="id_kota" type="hidden" value="<?php echo $auto; ?>"/>
            <br />
            <label for="nama_kota">Nama Kota : </label>
            <input id="nama_kota" name="nama_kota" type="text" />
            <br />
            <label for="ongkos_kirim">Ongkos Kirim : </label>
            <input id="ongkos_kirim" name="ongkos_kirim" type="text" />
            <br />
        </fieldset>
        <div align="center">
            <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
            <input id="button2" type="reset" />
        </div>
    </form>