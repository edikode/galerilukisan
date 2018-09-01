<!DOCTYPE html>
<html>
<head>
	<title>email</title>

	<style>
	* {
	    box-sizing: border-box;
	    font-family: Arial, Helvetica, sans-serif;
	}

	body {
	  margin: 0;
	  font-family: Arial, Helvetica, sans-serif;
	}

	/* Style the top navigation bar */
	.topnav {
	    overflow: hidden;
	    background-color: #94c045;
	    padding: 10px;
	}

	/* Style the content */
	.content {
	    background-color: white;
	    padding: 10px;
	    /*height: 200px;  Should be removed. Only for demonstration */
	}

	/* Style the footer */
	.footer {
	    background-color: #f1f1f1;
	    padding: 10px;
	}

	#customers {
	    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	    border-collapse: collapse;
	    width: 100%;
	}

	#customers td, #customers th {
	    border: 1px solid #ddd;
	    padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
	    padding-top: 12px;
	    padding-bottom: 12px;
	    text-align: left;
	    background-color: #4CAF50;
	    color: white;
	}

	/*link*/
	a:link {
	    text-decoration: none;
	}

	a:visited {
	    text-decoration: none;
	}

	a:hover {
	    text-decoration: underline;
	}

	a:active {
	    text-decoration: underline;
	}

	/*a:link, a:visited {
	    background-color: #f44336;
	    color: white;
	    padding: 14px 25px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	}


	a:hover, a:active {
	    background-color: red;
	}*/
	
	</style>
</head>
<body>

	<div class="topnav">
	  <h1 align="center" style="margin-bottom:2px">Galeri Cahaya Pelangi</h1>
	  <p align="center" style="margin:0px">Dusun Gantung, Desa Gendoh, RT.01 RW.01, Kecamatan Sempu, Kabupaten Banyuwangi.</p>
	  <p align="center" style="margin-top:4px"><strong>Telp: 081123456789 | Email: cahayapelangi@gmail.com</strong></p>
	</div>

	<div class="content">
		<table>
			<tr>
				<td width="15%"></td>
				<td>
					<br><br>
					<h2>Halo <?php echo $pembeli; ?></h2>

					<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Konfirmasi pembayaran anda tidak valid. Cek kembali data pemesanan/pembelian anda, dan periksa kembali jumlah total biaya yang harus dibayar. Lakukan konfirmasi ulang <a href="<?php echo site_url('pembayaran') ?>">Klik Disini</a>
					</p>

					<br>

					<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Sekian Pemberitahuan dari Kami, Kritik dan saran yang baik sangat kami harapkan untuk menjadikan perusahaan ini menjadi lebih baik. Kurang lebihnya kami mohon maaf. Terima Kasih Atas kerjasama anda.</p>

					<br>
					<h3 style="margin-bottom: 2px">Hormat Kami,</h3>
					<h3 style="margin-top: 2px">Admin Lukisan</h3>
					<br><br>
				</td>
				<td width="15%"></td>
			</tr>
		</table>
		
	</div>

	<div class="footer">
	  <p align="center">Galeri Cahaya Pelangi | Copyright 2018</p>
	</div>

</body>
</html>                <p>
                    Yth. <?php echo $pembeli; ?>
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
                <br>
                <p>
                    Note: Simpan Email ini sebagai bukti pembayaran anda.
                </p>
                <br>
                <p>
                    Admin,<br>LukisanStore
                </p>
			</div>
		</div>
	</div>

</body>
</html>
                    Yth. <?php echo $pembeli; ?>
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konfirmasi pembayaran anda tidak valid. Cek kembali data pemesanan anda, dan periksa kembali jumlah Invoice yang harus dibayar. Lakukan konfirmasi ulang <a href="<?php echo site_url('pembayaran') ?>">Klik Disini</a>
                </p>
                <p>
                    Butuh Bantuan ? Hubungi CS Kami di +62 821 4296 1911
                </p>
                <br>
                <p>
                    Note: Pembayaran anda gagal silahkan dicoba lagi
                </p>
                <br>
                <p>
                    Admin,<br>LukisanStore
                </p>
			</div>
		</div>
	</div>

</body>
</html>