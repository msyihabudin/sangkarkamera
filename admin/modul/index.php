<table>
    <tr>
        <td>
        	<h1>Welcome !</h1><br>
        	<p>Hi <strong><?php echo $_SESSION[nama_lengkap]; ?></strong>, welcome to the Administrator page.</p>
        	<p>Please click menu options are left to manage the content of your website.</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        	<p align="right">
        		<?php
				function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
				   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
						$BulanIndo = array("Januari", "Februari", "Maret",
										   "April", "Mei", "Juni",
										   "Juli", "Agustus", "September",
										   "Oktober", "November", "Desember");
					
						$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
						$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
						$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
						
						$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
						return($result);
				}

					echo "Login : ";				
					echo(DateToIndo(Date("Y-m-d"))); //Akan menghasilkan 25 Agustus 2011
					echo " | ";
					echo Date("H:i:s");
				?>

        	</p>
    	</td>
    </tr>
</table>