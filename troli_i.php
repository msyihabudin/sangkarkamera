<?php
include_once("koneksi.php");
koneksi();

session_start();
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}

$idtransaksi = $_SESSION['transaksi'];
$id = $_GET['id'];
if(!isset($id)){
    die("Tidak ada transaksi");
}

$query = mysql_query("select * from barang where id=$id");
$b = mysql_fetch_array($query);
$harga = $b['harga'];

$masuk = mysql_query("insert into tabelpesan values(null,'$idtransaksi',$id,1,$harga)");
if($masuk){
    header('location:../design/troli.php?p=index');
}else{
    echo "error";
}
?>
