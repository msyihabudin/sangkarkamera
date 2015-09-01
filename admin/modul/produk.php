<?php
error_reporting(0);
?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='tambah'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Ditambahkan ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=produk_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Ditambahkan !</p></div>";
        }
        ?>
    </div>
</center>
<h3 id="addproduct"> <a href="produk.php" class="cart"> Add Product </a></h3><hr>
    <form id="form" action="admin.php?p=produk_t" method="post" enctype="multipart/form-data">
        <fieldset id="personal">
            <legend>PRODUCT INFORMATION</legend>
            <label>Nama Produk : </label>
            <input name="jenis" id="jenis" type="text" tabindex="2" />
            <br />
            <label>Merk : </label>
            <input name="merk" id="merk" type="text" tabindex="2" />
            <br />
            <label>Gambar : </label>
            <input name="gambar" id="gambar" type="file" tabindex="2" />
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
            <input name="stok" id="stok" type="text" tabindex="2" />
            <br />
            <label>Harga : </label>
            <input name="harga" id="harga" type="text" tabindex="2" /> /Satuan
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