<?php
error_reporting(0);

include_once("koneksi.php");

koneksi();
$tabel = "kota";

//ambil nilai variabel URL
$id=$_GET['id'];

$query="SELECT * FROM $tabel WHERE id = '$id'";
//echo $query;
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
    {   

    if(mysql_affected_rows() > 0)
        {
        $id_kota=$data["id_kota"];
        $nama_kota=$data['nama_kota'];
        $ongkos_kirim=$data["ongkos_kirim"];
        }
    else
        {
        echo "<script>alert('Maaf, record tidak ditemukan');</script>";
        echo "<script>history.go(-1);</script>";
        }
    }

?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='edit'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Diubah ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=kota_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Diubah !</p></div>";
        }
        ?>
    </div>
</center>
<h3 id="addcity"> <a href="kota.php" class="folder"> Update City </a></h3><hr>
    <form id="form" action="admin.php?p=kota_es" method="post" enctype="multipart/form-data">
        <fieldset id="personal">
            <legend>CATEGORY INFORMATION</legend>
            <label for="id_kota">ID Kota : </label>
            <input id="id_kota" name="id_kota" type="text" value="<?php echo $id_kota; ?>" disabled="disabled"/>
            <input id="id_kota" name="id_kota" type="hidden" value="<?php echo $id_kota; ?>"/>
            <br />
            <label for="nama_kota">Nama Kota : </label>
            <input id="nama_kota" name="nama_kota" type="text" value="<?php echo $nama_kota; ?>" />
            <br />
            <label for="ongkos_kirim">Ongkos Kirim : </label>
            <input id="ongkos_kirim" name="ongkos_kirim" type="text" value="<?php echo $ongkos_kirim;?>" />
            <br />
        </fieldset>
        <div align="center">
            <input name="proses" id="button1" type="submit" value="Update" onclick='editor.post();' />
            <input id="button2" type="reset" />
        </div>
    </form>