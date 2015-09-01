<?php
error_reporting(0);

include_once("koneksi.php");

koneksi();
$tabel = "barang";

//ambil nilai variabel URL
$id=$_GET['id'];

$query="SELECT * FROM $tabel WHERE id = '$id'";
//echo $query;
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
    {   

    if(mysql_affected_rows() > 0)
        {
        $jenis=$data["jenis"];
        $merk=$data["merk"];
        $gambar=$data["gambar"];
        $id_kategori=$data["id_kategori"];
        $stok=$data["stok"];
        $harga=$data["harga"];
        $keterangan=$data["keterangan"];
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
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=produk_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Diubah !</p></div>";
        }
        ?>
    </div>
</center>
<h3 id="addproduct"> <a href="produk.php" class="cart"> Add Product </a></h3><hr>
    <form id="form" action="admin.php?p=produk_es" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <fieldset id="personal">
            <legend>PRODUCT INFORMATION</legend>
            <label>Nama Produk : </label>
            <input name="jenis" id="jenis" type="text" tabindex="2" value="<?php echo $jenis;?>" />
            <br />
            <label>Merk : </label>
            <input name="merk" id="merk" type="text" tabindex="2" value="<?php echo $merk; ?>" />
            <br />
            <label>Gambar : </label>
            <img src="../img/image/<?php echo $data['photo'];?>" width="50px" height="50px">
            <br />
			<label>Ganti Gambar : </label>
            <input name="gambar" id="gambar" type="file" tabindex="2" />
			<label></label>	&nbsp;*) Apabila Gambar tidak diubah dikosongkan saja.
            <br />
            <label>Kategori : </label>
            <select name="id_kategori">
                <option value=""> --Select Category-- </option>
                <?php
                include_once("koneksi.php");
                koneksi();
        
                //nama tabel
                $tabel1 = "kategori";
         
                $sql = "select * from $tabel1";
                $qry = mysql_query($sql) or die ("ERROR..".mysql_error());
                while ($data = mysql_fetch_array($qry)) {
                ?>
                    
                <option value="<?php echo $data['id_kategori']; ?>"> <?php echo $data['kategori']; ?> </option><?php } ?>
            </select>
            <br />
            <label>Stok : </label>
            <input name="stok" id="stok" type="text" tabindex="2" value="<?php echo $stok;?>" />
            <br />
            <label>Harga : </label>
            <input name="harga" id="harga" type="text" tabindex="2" value="<?php echo $harga;?>" /> /Satuan
            <br />
            <label>Keterangan : </label>
            <div class="clearer"></div>
            <center>
            <textarea name="keterangan" id="tinyeditor" class="textarea" rows="10" ><?php if ($keterangan) echo $keterangan;  ?></textarea>
            <script>
            var editor = new TINY.editor.edit('editor', {
                id: 'tinyeditor',
                width: 700,
                height: 150,
                cssclass: 'tinyeditor',
                controlclass: 'tinyeditor-control',
                rowclass: 'tinyeditor-header',
                dividerclass: 'tinyeditor-divider',
                controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
                    'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
                    'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
                    'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
                footer: true,
                fonts: ['Verdana','Calibri','Arial','Georgia','Trebuchet MS'],
                xhtml: true,
                cssfile: 'custom.css',
                bodyid: 'editor',
                footerclass: 'tinyeditor-footer',
                toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
                resize: {cssclass: 'resize'}
            });
            </script>
            <br /></center>
        </fieldset>
        <div align="center">
            <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
            <input id="button2" type="reset" />
        </div>
    </form>