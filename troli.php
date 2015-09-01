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
	<title> KANDANG KAMERA | Troli </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
	var ajaxku;
	var idnya;
	function update(id){
	    idnya = id;
	    ajaxku = buatajax();
	    idinput = "jumlah"+id;
	    idloading = "loading"+id;
	    jumlah = document.getElementById(idinput).value;
	    var url="updatejumlah.php";
	    url=url+"?id="+id;
	    url=url+"&jml="+jumlah;
	    url=url+"&sid="+Math.random();
	    ajaxku.onreadystatechange=stateChanged;
	    ajaxku.open("GET",url,true);
	    ajaxku.send(null);
	    document.getElementById(idloading).innerHTML = "<img src=ajax-loader.gif>";
	}

	function buatajax(){
	    if (window.XMLHttpRequest){
	        return new XMLHttpRequest();
	    }
	    if (window.ActiveXObject){
	        return new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    return null;
	}

	function stateChanged(){
	var data;
	    if (ajaxku.readyState==4){
	        data=ajaxku.responseText;
	        subtotalx = document.getElementById("subtotal").innerHTML;
	        sub = parseFloat(subtotalx);
	        idharga = "harga"+idnya;
	        idloading = "loading"+idnya;
	        harganya = document.getElementById(idharga).innerHTML;
	        hrg = parseFloat(harganya);
	        if(data.length>0){
	            hargabaru = parseFloat(data);
	            subtotalbaru = sub-hrg+hargabaru;
	            document.getElementById(idloading).innerHTML = "";
	            document.getElementById(idharga).innerHTML = data;
	            document.getElementById("subtotal").innerHTML = subtotalbaru;
	        }
	    }
	}
	</script>
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
		<div id="content-atas">
			<div class="kotak1"><h1>My Shopping Cart</h1></div>
			<div class="kotak2">
				<?php
				//tabel
				$tabelpesan = "tabelpesan";

				$idtransaksi = $_SESSION['transaksi'];
				$keranjangx = mysql_query("select * from $tabelpesan where idtransaksi='$idtransaksi'");
				$pesan = 0;
				while($psn = mysql_fetch_array($keranjangx)){
				    $pesan = $pesan + $psn['jumlah'];
				}
				?>
				<img border="0" src="img/cart-icon.png" align="left" width="64" height="64"><b><font size="6"><?php echo $pesan;?></font></b>
    Pesanan
   				<br>
				<?php
				if($pesan>0){
				    echo "<a href=troli.php>[lihat]</a>";
				}
				?>

			</div>
			<div class="clearer"></div>
			<div class="kotak3"></div>
		</div>
		<div class="clearer"></div>

		<?php
        //include "halaman.php";

        $pages_dir = 'troli';
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
            include($pages_dir.'/index.php');
        }

        ?>		     
	</div>

	<div class="clearer"></div>

	<?php include 'footer.php';?>
</div>
</body>
</html>