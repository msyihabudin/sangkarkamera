<?php
$page=$_GET['p'];

//Dashboard
if($page=="home"){
  include "modul/index.php"; 
}
elseif($page=="sales"){
  include "modul/sales.php"; 
}

//Orders
elseif($page=="order_l"){
  include "modul/order_l.php";
}
elseif($page=="kirim"){
  include "modul/kirim.php";
}
elseif($page=="cancel"){
  include "modul/cancel.php";
}
elseif($page=="kirim_l"){
  include "modul/kirim_l.php";
}
elseif($page=="invoice"){
  include "modul/invoice.php";
}
elseif($page=="detail-invoice"){
  include "modul/detail-invoice.php";
}

//Manage
elseif($page=="produk_l"){
  include "modul/produk_l.php";
}
elseif($page=="produk"){
  include "modul/produk.php";
}
elseif($page=="produk_e"){
  include "modul/produk_e.php";
}
elseif($page=="produk_t"){
  include "modul/produk_t.php";
}
elseif($page=="produk_es"){
  include "modul/produk_es.php";
}
elseif($page=="kategori_l"){
  include "modul/kategori_l.php";
}
elseif($page=="kategori"){
  include "modul/kategori.php";
}
elseif($page=="kategori_e"){
  include "modul/kategori_e.php";
}
elseif($page=="kategori_t"){
  include "modul/kategori_t.php";
}
elseif($page=="kategori_es"){
  include "modul/kategori_es.php";
}
elseif($page=="kota_l"){
  include "modul/kota_l.php";
}
elseif($page=="kota"){
  include "modul/kota.php";
}
elseif($page=="kota_e"){
  include "modul/kota_e.php";
}
elseif($page=="kota_t"){
  include "modul/kota_t.php";
}
elseif($page=="kota_es"){
  include "modul/kota_es.php";
}
elseif($page=="delete"){
  include "modul/delete.php";
}

//Users
elseif($page=="user"){
  include "modul/user.php";
}
elseif($page=="user_l"){
  include "modul/user_l.php";
}
elseif($page=="user_t"){
  include "modul/user_t.php";
}
elseif($page=="user_e"){
  include "modul/user_e.php";
}
elseif($page=="user_es"){
  include "modul/user_es.php";
}
elseif($page=="user_n"){
  include "modul/user_n.php";
}
elseif($page=="user_y"){
  include "modul/user_y.php";
}
elseif($page=="user_cari"){
  include "modul/user_cari.php";
}
elseif($page=="profil_l"){
  include "modul/profil_l.php";
}
elseif($page=="profil_e"){
  include "modul/profil_e.php";
}
elseif($page=="profil_es"){
  include "modul/profil_es.php";
}

//Jika Tidak ada
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>