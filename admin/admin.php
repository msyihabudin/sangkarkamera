<?php
include_once("koneksi.php");
include "../lib/class_paging.php";
include "../lib/library.php";

error_reporting(0);
session_start();

if ($_SESSION[bsi]=='Copyright-syihab'){
    if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])) {
        echo "<center>Untuk Mengakses modul, Anda harus login!..<br>";
        echo "<a href=login.php?bsi=welcome><b>LOGIN</b></a></center>";
    }
    else {
?>

<!DOCTYPE html>
<html>
<head>
	<title> Halaman Administrator </title>
	<link rel="stylesheet" type="text/css" href="../css/style-admin.css">
	<link rel="stylesheet" type="text/css" href="../css/tinyeditor.css" />
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/tiny.editor.packed.js"></script>
</head>
<body>
	<div class="wrapper">
		<div id="header">
			<a href="../index.php" target="_blank"><img src="../img/taskamonline.png" width="300px"></a>
			<p>Welcome, <strong><?php echo $_SESSION[nama_lengkap]; ?></strong> [ <a href="logout.php">Logout</a> ]</p> 
		</div>

		<div class="clearer"></div>

		<div id="sidebar">
			<div id="sidebar-isi">
				<ul>
					<?php
			  		if($_SESSION[leveluser]=='All-Privileges' OR $_SESSION[leveluser]=='User'){
			 		?>
					<li><h3><a href="#" class="house">Dashboard</a></h3>
		                <ul>
		                	<li><a href="?p=home" class="house">Home</a></li>
		                  	<li><a href="?p=sales" class="report">Sales Report</a></li>
		                </ul>
		            </li>
		            <?php
					}
			  		if($_SESSION[leveluser]=='All-Privileges' OR $_SESSION[leveluser]=='User'){
			 		?>
		            <li><h3><a href="#" class="folder_table">Orders</a></h3>
		          		<ul>
		                  	<li><a href="?p=order_l" class="addorder">New order</a></li>
		                    <li><a href="?p=kirim_l" class="shipping">Shipments</a></li>
		                    <li><a href="?p=invoice" class="invoices">Invoices</a></li>
		                </ul>
		            </li>
		            <?php
					}
			  		if($_SESSION[leveluser]=='All-Privileges' OR $_SESSION[leveluser]=='User'){
			 		?>
		            <li><h3><a href="#" class="manage">Manage</a></h3>
		          		<ul>
		                    <li><a href="?p=produk_l" class="cart">Products</a></li>
		                    <li><a href="?p=kategori_l" class="folder">Product categories</a></li>
		                    <li><a href="?p=kota_l" class="kota">Cities</a></li>
		                </ul>
		            </li>
		            <?php
					}
			  		if($_SESSION[leveluser]=='All-Privileges'){
			 		?>
		            <li><h3><a href="#" class="user">Users</a></h3>
		          		<ul>
		            	    <li><a href="?p=user" class="useradd">Add user</a></li>
		                    <li><a href="?p=user_l" class="group">User groups</a></li>
		            		<li><a href="?p=user_cari" class="search">Find user</a></li>
		            	</ul>
		          	</li>
		          	<?php
		          	}
		            if($_SESSION[leveluser]=='User'){
		            ?>
		            <li><h3><a href="#" class="user">Users</a></h3>
		          		<ul>
		            		
		            		<li><a href="?p=profil_l" class="useredit">Edit My Profile</a></li>
		                </ul>
		          	</li>
		          	<?php } ?>
				</ul>
		    </div>
		</div>
		<div id="content">
			<?php
            include "content.php";
            ?>
		</div>

		
	</div>
</body>
</html>
<?php
    }
}else{
    session_start();
    session_destroy();
    
    header('location:index.php?bsi=denied');
}
?>