<?php
include_once("koneksi.php");
koneksi();

$id = $_GET['id'];

$del = mysql_query("delete from tabelpesan where nomor=$id");
if($del){
    header("location:troli.php");
}else{
    echo "error";
}
?>
