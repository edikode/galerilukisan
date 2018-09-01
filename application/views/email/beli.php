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
					<h2>Halo <?php $pembeli = $this->User_model->detail_data($pembeli_id);  echo ucfirst($pembeli->first_name); ?></h2>

					<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						ini adalah email pemberitahuan tentang pembelian lukisan yang anda lakukan pada website kami <a href="<?php echo site_url(); ?>">Galeri Cahaya Pelangi</a>. Selanjutnya cek kembali detail pembelian anda dibawah ini, jika sudah sesuai dengan pembelian yang anda lakukan, berikutnya anda harus melakukan konfirmasi dengan melakukan pembayaran dan upload bukti pembayaran pada website kami <a href="<?php echo site_url('pembayaran'); ?>">Disini.</a></a>
					</p>

					<h4 align="center">Detail Pembelian Sebagai Berikut:</h4>

					<table style="width: 100%;">
						<tr>
							<td width="15%"></td>
							<td valign="top">
								<h4 style="margin: 0px">Alamat Tujuan:</h4>
								<p>
									<?php echo $alamat; ?><br>
									<?php echo $kabupaten; ?> - <?php echo $provinsi; ?><br>
									<?php echo $kode_pos; ?>
								</p>
							</td>
							<td valign="top">
								<h4 style="margin: 0px">Kurir:</h4>
								<p>
									<?php echo ucfirst($kurir); ?><br>
									<?php echo ucfirst($layanan); ?>
								</p>
							</td>
							<td width="15%"></td>
						</tr>
						<tr>
							<td width="15%"></td>
							<td colspan="2">
								<table id="customers">
								  <tr>
								    <th>Invoice</th>
								    <th><?php echo $invoice; ?></th>
								  </tr>
								  <tr>
								    <td>Tanggal Pembelian</td>
								    <td><?php echo $this->fungsi->tanggal_id($tanggal); ?></td>
								  </tr>
								  <tr>
								    <td valign="top">Detail Lukisan</td>
								    <td><?php
								    	$jumlah = 0;
								    	$no = 1;
							            foreach($this->cart->contents() as $data){
							            	
							            	$produk = $this->Produk_model->detail_data($data['id']);
							               	$kategori = $this->Kategori_model->detail_data($produk->kategori_id);
								    		$ukuran = $this->Ukuran_model->detail_data($produk->ukuran_id);

							               	echo $no++.'. '.$data['name'].' ('.$data['qty'].')<br>';

								    		echo 'Kategori: '.$kategori->nama.'<br>Ukuran: '.$ukuran->ukuran.' Cm.<br>Berat: '.$ukuran->berat.' Kg.<br><br>';
							            
						        			$jumlah = $jumlah+$data['qty'];
						        		} 

							        	?>
							        </td>
								  </tr>
								  <tr>
								    <td>Jumlah Pesan</td>
								    <td><?php echo $jumlah; ?></td>
								  </tr>
								  <tr>
								    <td>Total</td>
								    <td><?php echo 'Rp. '.number_format($total-$ongkir, 0, ',', '.'); ?>,-</td>
								  </tr>
								  <tr>
									<td>Ongkir</td>
									<td><?php echo 'Rp. '.number_format($ongkir, 0, ',', '.'); ?>,-</td>
								  </tr>
								  <tr>
									<td>Total + Ongkir</td>
									<td><?php echo 'Rp. '.number_format($total, 0, ',', '.'); ?>,-</td>
								  </tr>
								  
								</table>

								<br>
								<p align="justify">
								<b>Syarat dan ketentuan:</b><br/>
									- Silahkan melakukan pembayaran untuk lukisan yang anda beli/pesan.Pembayaran paling lambat 1 hari setelah pemesanan/pembelian. Pembayaran dapat di transfer ke rekening Mandiri xxx.xx. xxxx.xxxx an. Galeri Cahaya Pelangi atau BCA xxxxxxxxx an. Ayu Nur Oktavianti.<br/><br/>
									- Setelah Anda melakukan transfer untuk pembayaran lukisan, silahkan Anda melakukan konfirmasi pembayaran dengan cara klik konformasi pembayaran diatas atau bisa klik <a href="<?php echo site_url('pembayaran#pemesanan'); ?>">disini</a>.<br/>
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
	  <p align="center"><a href="<?php echo site_url('/') ?>" style="color: #94c045">Galeri Cahaya Pelangi</a> | Copyright 2018</p>
	</div>

</body>
</html>
