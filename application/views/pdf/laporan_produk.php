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
	<h2 align="center">Laporan Produk Lukisan Bulan <?php echo $this->fungsi->getbulan_id(date("m")).' '.date("Y"); ?></h2>
	<p align="center" style="margin:0px"><?php echo $profil->alamat; ?></p>
	<p align="center" style="margin:0px"><strong><?php echo "Telp: ".$profil->telepon." | Email: ".$profil->email; ?></strong></p>
	<br><br><br>
	<?php if ($keyword != ''): ?>
		<p><?php echo ucfirst($filter).' : '.ucfirst($keyword); ?></p>
	<?php endif ?>
	<table>
        <thead>
            <tr>
                <th class="no">No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Ukuran</th>
                <th>Berat</th>
                <th>Estimasi Pembuatan</th>
                <th width="100px">Harga</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach($laporan as $p){
                ?>
                <tr>
                    <td class="no"><?php echo $no++; ?></td>
                    <td><?php echo $p->nama; ?></td>
                    <td><?php echo $p->kategori; ?></td>
                    <td>
                        <?php 
                        $ukuran = $this->Ukuran_model->detail_data($p->ukuran_id);
                        echo $ukuran->ukuran;
                        ?> Cm
                    </td>
                    <td><?php echo $ukuran->berat; ?> Kg</td>
                    <td>
                        <?php 
                        $data_harga = $this->Harga_model->cari_harga($ukuran->id,$p->kategori_id);
                        echo $data_harga->lama_pembuatan; ?>
                        </td>
                    <td style="text-align: right">
                        Rp. <?php echo number_format($data_harga->harga, 0, ',', '.'); ?>,-     
                    </td>
                </tr>

            <?php } 
            
            if(count($laporan) == 0){
                echo "<tr><td colspan='8' align='center'><strong>Tidak Ada data</stor</td></tr>";
            }

            ?>
        </tbody>
    </table>
    <br><br><br>
    <h6>Jumlah Produk: <?php echo count($laporan); ?></h6>
</body>
</html>