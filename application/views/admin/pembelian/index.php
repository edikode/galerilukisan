<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Pembelian</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">Pembelian</h2>
        <!-- <a href="<?php //echo base_url('admin/produk/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a> -->
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Pembelian
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th>Tujuan</th>
                        <th>Total</th>
                        <th width="150px">Status</th>
                        <th class="opsi">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($pembelian as $p){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td>
                                <?php
                                $pembeli = $this->User_model->detail_data($p->pembeli_id);
                                echo $pembeli->first_name;
                                ?>
                            </td>
                            <td><?php echo $p->alamat; ?><br><?php echo $p->kabupaten; ?>-<?php echo $p->provinsi; ?></td>
                            <td align="right"><?php echo number_format($p->total, 0, ',', '.'); ?></td>
                            <td>
                                <?php 
                                if ($p->status == 3) {
                                    echo "<div class='alert alert-warning'>Menunggu Validasi dari Admin</div>";
                                } else if($p->status == 2){
                                    echo "<div class='alert alert-danger'>Pembayaran Tidak Valid</div>";
                                } else if($p->status == 1){
                                    echo "<div class='alert alert-success'>Data Sukses divalidasi, dan proses pengiriman</div>";
                                } else if($p->status == 0){
                                    echo "<div class='alert alert-danger'>Belum Konfirmasi</div>";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('admin/pembelian/edit/'.$p->id); ?>" class="btn btn-info btn-sm" title="Edit">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a data-toggle="modal" data-target="#<?php echo $p->id ?>" title="Validasi admin" class="btn btn-warning btn-sm">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="<?php echo site_url('admin/pembelian/hapus/'.$p->id); ?>" class="btn btn-danger btn-sm" title="Hapus">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="<?php echo $p->id ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Bukti Konfirmasi</h4>
                              </div>
                              <div class="modal-body">
                                <?php if($p->gambar != ""){ ?>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail">
                                        <div class="hapus-gambar">
                                            <a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="<?php echo base_url('admin/konfirmasi/hapusgambar/'.$p->id) ?>" onclick="return hapusgambar()">
                                                <i class="icon-remove icon-white"></i>
                                            </a>
                                        </div>
                                        <img src="<?php echo base_url('upload/konfirmasi/'.$p->gambar) ?>">
                                    </div>                                      
                                </div>
                                <?php } else { ?>
                                <h2>Pelanggan belum melakukan konfirmasi pembayaran</h2>
                                <?php } ?>
                              </div>
                              <div class="modal-footer">
                                <?php if ($p->status == 3): ?>
                                    <a href="<?php echo site_url('admin/pembelian/validasi/'.$p->id) ?>" class="btn btn-success pull-left">Validasi</a>
                                    <a href="<?php echo site_url('admin/pembelian/nonvalidasi/'.$p->id) ?>" class="btn btn-danger">Tidak Valid</a>
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        </div>

                    <?php } ?>

                </tbody>
            </table>

            <?php //echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
