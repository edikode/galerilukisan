<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Video</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header" style="display: initial;">Video</h2>
        <a href="<?php echo base_url('admin/video/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a>
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data video
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th class="opsi">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($video as $k){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td><?php echo $k->nama; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/video/edit/'.$k->id); ?>" class="btn btn-info btn-sm" title="Edit">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="<?php echo site_url('admin/video/hapus/'.$k->id); ?>" class="btn btn-danger btn-sm" title="Hapus">
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
