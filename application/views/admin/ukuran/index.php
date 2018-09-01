<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Ukuran Produk</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header" style="display: initial;">Ukuran Produk</h2>
        <a href="<?php echo base_url('admin/ukuran/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a>
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Ukuran Produk
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th class="opsi">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($ukuran as $k){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td><?php echo $k->ukuran; ?> Cm</td>
                            <td><?php echo $k->berat; ?> Kg</td>
                            <td>
                                <a href="<?php echo site_url('admin/ukuran/edit/'.$k->id); ?>" class="btn btn-info btn-sm" title="Edit">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="<?php echo site_url('admin/ukuran/hapus/'.$k->id); ?>" class="btn btn-danger btn-sm" title="Hapus">
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
