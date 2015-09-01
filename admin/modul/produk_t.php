<?php
include_once ("koneksi.php");

koneksi();

$table = "barang";

$jenis = $_POST['jenis'];
$merk = $_POST['merk'];
$id_kategori = $_POST['id_kategori'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$keterangan = isset($_REQUEST['keterangan']) ? $_REQUEST['keterangan'] : "" ;

// Input Produk
if($_POST['proses'] == 'Send') {

  if ($jenis == '') {
    echo "<script>alert('Nama Produk harus di isi!');window.location='admin.php?p=produk'</script>";
  } elseif ($merk == '') {
    echo "<script>alert('Merk harus di isi!');window.location='admin.php?p=produk'</script>";
  } elseif ($_FILES['gambar']['tmp_name'] == '') {
    echo "<script>alert('Anda harus memilih Gambar!');window.location='admin.php?p=produk'</script>";
  } elseif ($id_kategori == '') {
    echo "<script>alert('Anda harus memilih Kategori!');window.location='admin.php?p=produk'</script>";
  } elseif ($stok == '') {
    echo "<script>alert('Stok harus di isi!');window.location='admin.php?p=produk'</script>";
  } elseif ($harga == '') {
    echo "<script>alert('Harga harus di isi!');window.location='admin.php?p=produk'</script>";
  } elseif ($keterangan == '') {
    echo "<script>alert('Keterangan harus di isi!');window.location='admin.php?p=produk'</script>";
  } else {

  // Cek Photo-------------------------------------------------------------------
  $tipe_gambar = array('image/jpeg','image/bmp', 'image/x-png');

  $gbr = $_FILES['gambar']['name'];

  $ukuran = $_FILES['gambar']['size'];

  $tipe = $_FILES['gambar']['type'];

  $error = $_FILES['gambar']['error'];

  if($gbr !=="" && $ukuran > 0 && $error == 0){
    //if(in_array(strtolower($tipe), $tipe_gambar)){
      $move = move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/image/'.$gbr);
    //}

    if($move == 1) {
        echo "Gambar berhasil dikirim".$gbr;
        $input="INSERT INTO $table (jenis, merk, photo, id_kategori, stok, harga, keterangan, tanggal)
              VALUES ('$jenis', '$merk', '$gbr', '$id_kategori', '$stok', '$harga', '$keterangan', now())";

        //kirim perintah query
        $query=mysql_query($input) or die ("Gagal".mysql_error());

        if(mysql_affected_rows() > 0)
        {
            header('location:../admin/admin.php?p=produk&bsi=tambah');
        }
        else
        {
            header('location:../admin/admin.php?p=produk&bsi=gagal');
        }
    } else {
        echo "Gambar gagal dikirim!";
    }
  }
  //-------------------------------------------------------------------------
  }
}
?>