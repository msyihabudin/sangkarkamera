<?php
include_once ("koneksi.php");

koneksi();

$table = "kota";

$id_kota = $_POST['id_kota'];
$nama_kota = $_POST['nama_kota'];
$ongkos_kirim = $_POST['ongkos_kirim'];

$pola_angka = "^[0-9]+$";

// Input Siswa
if($_POST['proses'] == 'Send') {
	if ($nama_kota == '') {
		echo "<script>alert('Nama Kota harus di isi!');window.location='admin.php?p=kota'</script>";
  } elseif ($ongkos_kirim == '') {
    echo "<script>alert('Ongkos Kirim harus di isi!');window.location='admin.php?p=kota'</script>";
  } elseif (!eregi($pola_angka,$ongkos_kirim)) {
    echo "<script>alert('Ongkos Kirim harus di isi dengan angka!');window.location='admin.php?p=kota'</script>";
	} else {
  		$input="INSERT INTO $table (id_kota, nama_kota, ongkos_kirim)
          VALUES ('$id_kota', '$nama_kota', '$ongkos_kirim')";
    }

  //kirim perintah query
  $query=mysql_query($input) or die ("Gagal".mysql_error());

  if(mysql_affected_rows() > 0) {
    header('location:../admin/admin.php?p=kota&bsi=tambah');
  } else {
    header('location:../admin/admin.php?p=kota&bsi=gagal');
  }
}
?>