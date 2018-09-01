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
	}
	*/
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
					<h2>Halo Pelanggan</h2>

					<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						ini adalah email pemberitahuan tentang pemesanan lukisan yang anda lakukan pada website kami <a href="<?php //echo site_url(); ?>">Galeri Cahaya Pelangi</a>. Selanjutnya cek kembali detail pemesanan anda dibawah ini, jika sudah sesuai dengan pemesananyang anda lakukan, berikutnya anda harus melakukan konfirmasi dengan melakukan pembayaran dan upload bukti pembayaran pada website kami <a href="<?php //echo site_url('pembayaran'); ?>">Disini.</a></a>
					</p>

					<h4 align="center">Detail Pemesanan Sebagai Berikut:</h4>

					<table style="width: 100%;">
						<tr>
							<td width="15%"></td>
							<td>
								<table id="customers">
								  <tr>
								    <th>Company</th>
								    <th>Contact</th>
								    <th>Country</th>
								  </tr>
								  <tr>
								    <td>Alfreds Futterkiste</td>
								    <td>Maria Anders</td>
								    <td>Germany</td>
								  </tr>
								  <tr>
								    <td>Berglunds snabbköp</td>
								    <td>Christina Berglund</td>
								    <td>Sweden</td>
								  </tr>
								  <tr>
								    <td>Centro comercial Moctezuma</td>
								    <td>Francisco Chang</td>
								    <td>Mexico</td>
								  </tr>
								  <tr>
								    <td>Ernst Handel</td>
								    <td>Roland Mendel</td>
								    <td>Austria</td>
								  </tr>
								  <tr>
								    <td>Island Trading</td>
								    <td>Helen Bennett</td>
								    <td>UK</td>
								  </tr>
								  <tr>
								    <td>Königlich Essen</td>
								    <td>Philip Cramer</td>
								    <td>Germany</td>
								  </tr>
								  <tr>
								    <td>Laughing Bacchus Winecellars</td>
								    <td>Yoshi Tannamuri</td>
								    <td>Canada</td>
								  </tr>
								  <tr>
								    <td>Magazzini Alimentari Riuniti</td>
								    <td>Giovanni Rovelli</td>
								    <td>Italy</td>
								  </tr>
								  <tr>
								    <td>North/South</td>
								    <td>Simon Crowther</td>
								    <td>UK</td>
								  </tr>
								  <tr>
								    <td>Paris spécialités</td>
								    <td>Marie Bertrand</td>
								    <td>France</td>
								  </tr>
								</table>

								<br>
								<p align="justify">
								<b>Syarat dan ketentuan:</b><br/>
									- Silahkan melakukan pembayaran untuk lukisan yang anda beli/pesan.<!--  DP paling lambat 1 hari sebelum perjalanan tour dilaksanan. --> Pembayaran dapat di transfer ke rekening Mandiri xxx.xx. xxxx.xxxx an. Galeri Cahaya Pelangi atau BCA xxxxxxxxx an. Ayu Nur Oktavianti.<br/><br/>
									- Setelah Anda melakukan transfer untuk pembayaran lukisan, silahkan Anda melakukan konfirmasi pembayaran dengan cara klik konformasi pembayaran diatas atau bisa klik <a href="<?php //echo site_url('pembayaran'); ?>">disini</a>.<br/>
								</p>

							</td>
							<td width="15%"></td>
						</tr>
					</table>

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
	  <p align="center"><a href="<?php //echo site_url('/') ?>" style="color: #94c045">Galeri Cahaya Pelangi</a> | Copyright 2018</p>
	</div>

</body>
</html>

