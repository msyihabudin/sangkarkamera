<?php
include_once ("koneksi.php");

koneksi();

$tabel = "barang";

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$id = antiinjection($_POST['id']);
$jenis = antiinjection($_POST['jenis']);
$merk = antiinjection($_POST['merk']);
$id_kategori = antiinjection($_POST['id_kategori']);
$stok = antiinjection($_POST['stok']);
$harga = antiinjection($_POST['harga']);
$keterangan = isset($_REQUEST['keterangan']) ? $_REQUEST['keterangan'] : "" ;

// Input Produk
if($_POST['proses'] == 'Send') {

  if ($jenis == '') {
    echo "<script>alert('Nama Produk harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($merk == '') {
    echo "<script>alert('Merk harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($id_kategori == '') {
    echo "<script>alert('Anda harus memilih Kategori!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($stok == '') {
    echo "<script>alert('Stok harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($harga == '') {
    echo "<script>alert('Harga harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($keterangan == '') {
    echo "<script>alert('Keterangan harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {

  if($_FILES['gambar']['tmp_name'] == ''){
	$edit2="UPDATE $tabel SET jenis = '$jenis', merk = '$merk', id_kategori = '$id_kategori', stok = '$stok', harga = '$harga', keterangan = '$keterangan', tanggal = now() WHERE id = '$id'";

        //kirim perintah query
        $query2=mysql_query($edit2) or die ("Gagal".mysql_error());

        if(mysql_affected_rows() > 0)
        {
            header('location:../admin/admin.php?p=produk_e&bsi=edit');
        }
        else
        {
            header('location:../admin/admin.php?p=produk_e&bsi=gagal');
        }
  } else {
  // Cek Photo-----------------------------------------------------------------------------
  $tipe_gambar = array('image/jpeg','image/bmp', 'image/x-png');

  $gbr = $_FILES['gambar']['name'];

  $ukuran = $_FILES['gambar']['size'];

  $tipe = $_FILES['gambar']['type'];

  $error = $_FILES['gambar']['error'];

  if($gbr !=="" && $ukuran > 0 && $error == 0){
    //if(in_array(strtolower($tipe), $tipe_gambar)){
      $move = move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/image/'.$gbr);
    //}

    if($move == 1) {
        echo "Gambar berhasil dikirim".$gbr;
        $edit="UPDATE $tabel SET jenis = '$jenis', merk = '$merk', photo = '$gbr', id_kategori = '$id_kategori', stok = '$stok', harga = '$harga', keterangan = '$keterangan', tanggal = now() WHERE id = '$id'";

        //kirim perintah query
        $query=mysql_query($edit) or die ("Gagal".mysql_error());

        if(mysql_affected_rows() > 0)
        {
            header('location:../admin/admin.php?p=produk_e&bsi=edit');
        }
        else
        {
            header('location:../admin/admin.php?p=produk_e&bsi=gagal');
        }
    } else {
        echo "Gambar gagal dikirim!";
    }
  }
  //------------------------------------------------------------------------------
  }
  }
}
?>