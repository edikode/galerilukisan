<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Harga Produk</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header" style="display: initial;">Harga Produk</h2>
        <a href="<?php echo base_url('admin/harga/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a>
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Harga Produk
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Kategori</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th>Lama Pembuatan</th>
                        <th>Harga</th>
                        <th class="opsi">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($harga as $k){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td><?php 
                                $kategori = $this->Kategori_model->detail_data($k->kategori_id);
                                echo $kategori->nama; 
                                ?>
                            </td>
                            <td>
                                <?php 
                                $ukuran = $this->Ukuran_model->detail_data($k->ukuran_id);
                                echo $ukuran->ukuran; 
                                ?> Cm
                            </td>
                            <td>
                                <?php echo $ukuran->berat; ?> Kg
                            </td>
                            <td align="justify">
                                <?php echo $k->lama_pembuatan; ?>
                            </td>
                            <td style="text-align: right">Rp. <?php echo number_format($k->harga, 0, ',', '.'); ?>,-</td>
                            <td>
                                <a href="<?php echo site_url('admin/harga/edit/'.$k->id); ?>" class="btn btn-info btn-sm" title="Edit">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="<?php echo site_url('admin/harga/hapus/'.$k->id); ?>" class="btn btn-danger btn-sm" title="Hapus">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
