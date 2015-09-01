<?php
// pemanggilan file koneksi
include_once ("koneksi.php");
koneksi();

$tabel = "user";

// pembuatan variable pada penginputan username dan password
$user = $_POST['username'];
$pass = $_POST['password'];

// cek username dan password di database
$login = mysql_query("select * from $tabel where username='$user' and password='$pass' and blokir='N'");
$ketemu = mysql_num_rows($login);
$r = mysql_fetch_array($login);

if ($ketemu > 0) {
	session_start ();

		$_SESSION[namauser] 	= $r[username];
		$_SESSION[passuser] 	= $r[password];
		$_SESSION[leveluser] 	= $r[level];
		$_SESSION[nama_lengkap] = $r[namalengkap];
		$_SESSION[bsi] 			= $r[keyword];
		
		if ($r[level]=="All-Privileges") {
			header('location:admin.php?p=home');			
		} elseif ($r[level]=="User") {
			header('location:admin.php?p=home');
		} else {
			header('location:index.php');
		}
	} else {
	header('location:login.php?bsi=gagallogin');
}
?>