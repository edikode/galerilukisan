<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Laporan Produk</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">Laporan Produk</h2>
        <!-- <a href="<?php //echo base_url('admin/produk/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a> -->
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Laporan Produk
    </div>
    <div class="card-body">
        <?php echo form_open('admin/laporan_produk','role="form" class="form-horizontal"'); ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="keyword">Filter Berdasarkan</label>
                        <select name="filter" class="form-control">
                            <option value="tanpa-filter">Semua</option>
                            <option value="nama" <?php if($filter == "nama") { echo "selected"; } ?>>Nama</option>
                            <option value="kategori" <?php if($filter == "kategori") { echo "selected"; } ?>>Kategori</option>
                            <option value="ukuran" <?php if($filter == "ukuran") { echo "selected"; } ?>>Ukuran</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="keyword">Kata Kunci</label>
                        <input type="text" id="keyword" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci" value="<?php echo $keyword; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Tampilkan</button>
                </div>
                <div class="col-md-4">
                    <a data-original-title='Cetak' target="_blank"  class='btn btn-warning tooltips' href='
                    <?php 
                    if($keyword == ''){ $keyword = "tanpa_keyword"; } else { $keyword; }
                    echo site_url('admin/laporan_produk/cetak/'.$filter.'/'.$keyword) ?>' style="margin-top: 30px; float: right;">
                        Cetak Laporan <i class='fa fa-print'></i>
                    </a>
                </div>
            
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th>Estimasi Pembuatan</th>
                        <th>Harga</th>
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
            <hr>
            <h6>Jumlah Produk: <?php echo count($laporan); ?></h6>
        </div>
    </div>
</div>
