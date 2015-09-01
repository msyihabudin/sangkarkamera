<?php
include_once("koneksi.php");
koneksi();

session_start();
if(!isset($_SESSION['transaksi'])){
    $idt = date("ymdHis");//membuat id transaksi yang unik berdasarkan waktu
    $_SESSION['transaksi'] = $idt;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> KANDANG KAMERA | Product </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">
	<div id="header-top">
	<div id="header-top-content"> 
		<div id="logo"> <a href="index.php"> <img src="img/taskamonline.png" width="300px"> </a> </div>
		<div id="menu">
			<?php include 'menu.php';?>
		</div>
	</div>
	</div>

	<div id="content">
		<?php
        //include "halaman.php";

        $pages_dir = 'cpanel';
        if(!empty($_GET['p'])){
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);

            $p = $_GET['p'];
            if(in_array($p.'.php', $pages)){
                include($pages_dir.'/'.$p.'.php');
            } else {
                echo 'Halaman tidak ditemukan! :(';
            }
        } else {
            include($pages_dir.'/catalog.php');
        }

        ?>		     
	</div>

	<div class="clearer"></div>

	<?php include 'footer.php';?>
</div>
</body>
</html>