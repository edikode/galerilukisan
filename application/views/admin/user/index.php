<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">User</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">User</h2>
        <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a>
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data User
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="opsi">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($user as $u){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td><?php echo $u->first_name; ?></td>
                            <td><?php echo $u->email; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/user/edit/'.$u->id); ?>" class="btn btn-info btn-sm" title="Edit">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <?php 
                                if($u->active == 0){ ?>
                                    <a href="" title="Aktifkan" class="btn btn-warning btn-sm">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                
                                <?php } else { ?>
                                    <a href="" title="Nonaktifkan" class="btn btn-warning btn-sm">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                <?php } ?>
                                
                                <a href="<?php echo site_url('admin/user/hapus/'.$u->id); ?>" class="btn btn-danger btn-sm" title="Hapus">
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
