<!DOCTYPE html>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table, td, th {    
		    border: 1px solid #ddd;
		    text-align: left;
		}

		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    padding: 8px;
		}

	</style>
</head>
<body>
	<h2 align="center">Laporan Pemesanan Lukisan Bulan <?php echo $bulan.' '.$tahun; ?></h2>
	<p align="center" style="margin:0px"><?php echo $profil->alamat; ?></p>
	<p align="center" style="margin:0px"><strong><?php echo "Telp: ".$profil->telepon." | Email: ".$profil->email; ?></strong></p>
	<br><br><br>
	<?php if ($keyword != ''): ?>
		<p>Alamat : <?php echo ucfirst($keyword); ?></p>
	<?php endif ?>
	<table>
        <thead>
            <tr>
                <th style="width: 14%;">Tanggal Pesan</th>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Detail Pemesanan</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            $qty_semua = 0;
            $total_semua = 0;
            foreach($laporan as $p){
                if($p->total == ""){
                    continue;
                }
                ?>
                <tr>
                    <td valign="top"><?php echo $this->fungsi->tanggal_id($p->tanggal); ?></td>
                    <td valign="top"><?php echo $p->invoice; ?></td>
                    <td valign="top">
                        <?php
                        $pembeli = $this->User_model->detail_data($p->pembeli_id);
                        echo $pembeli->first_name.'<br>';
                        echo 'Telp.'.$pembeli->phone;
                        ?>
                    </td>
                    <td valign="top"><?php echo $p->alamat.' - '.$p->provinsi; ?></td>
                    <td valign="top">
                        <?php 
                            $kategori = $this->Kategori_model->detail_data($p->kategori_id);
                            $ukuran = $this->Ukuran_model->detail_data($p->ukuran_id);
                            echo 'Kategori: '.$kategori->nama.', '.$ukuran->ukuran.'Cm '.$ukuran->berat.'kg';
                        ?>
                    </td>
                    <td align="center" valign="top"><?php echo $p->jumlah; ?></td>
                    <td align="right" valign="top"><?php echo number_format($p->total, 0, ',', '.'); ?></td>
                </tr>

            	<?php 
            	$qty_semua = $qty_semua + $p->jumlah;
            	$total_semua = $total_semua + $p->total;
        		} ?>

            	<tr>
            		<td colspan="5">Total</td>
            		<td align="center"><?php echo $qty_semua; ?></td>
            		<td align="right"><?php echo number_format($total_semua, 0, ',', '.'); ?></td>
            	</tr>

        </tbody>
    </table>
    <br><br><br>
    <h6>Jumlah Pemesanan: <?php echo count($laporan); ?></h6>
</body>
</html>