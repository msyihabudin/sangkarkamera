<?php
include_once ("koneksi.php");

koneksi();

$tabel = "kota";

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$id_kota = antiinjection($_POST['id_kota']);
$nama_kota = antiinjection($_POST['nama_kota']);
$ongkos_kirim = antiinjection($_POST['ongkos_kirim']);

$pola_angka = "^[0-9]+$";

// Input Siswa
if($_POST['proses'] == 'Update') {
  if ($nama_kota == '') {
    echo "<script>alert('Nama Kota harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($ongkos_kirim == '') {
    echo "<script>alert('Ongkos Kirim harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif (!eregi($pola_angka,$ongkos_kirim)) {
    echo "<script>alert('Ongkos Kirim harus di isi dengan angka!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
  $edit="UPDATE $tabel SET nama_kota = '$nama_kota', ongkos_kirim = '$ongkos_kirim' WHERE id_kota = '$id_kota'";
}

  //kirim perintah query
  $query=mysql_query($edit) or die ("Gagal... ".mysql_error());

  if(mysql_affected_rows() > 0) {
    header('location:../admin/admin.php?p=kota_e&bsi=edit');
  } else {
    header('location:../admin/admin.php?p=kota_e&bsi=gagal');
  }
}
?>