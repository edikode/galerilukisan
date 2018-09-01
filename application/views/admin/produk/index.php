<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Produk</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">Produk</h2>
        <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a>
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Produk
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th class="opsi">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($produk as $p){
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
                            <td style="text-align: right">Rp. 
                                <?php 
                                $cari_harga = $this->Harga_model->cari_harga($ukuran->id,$p->kategori_id);
                                echo number_format($cari_harga->harga, 0, ',', '.'); ?>,-</td>
                            <td >
                                <!--img height="80px" class="rounded mx-auto d-block" src=""-->
                                <a href="<?php echo base_url('upload/produk/'.$p->gambar); ?>" target="_blank">Lihat Gambar</a>        
                            </td>
                            <td><?php echo $p->stok; ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#<?php echo $p->id ?>" title="Tambah Stok" class="btn btn-success btn-sm">
                                    <span class="fa fa-plus"></span>
                                </a>
                                <a href="<?php echo site_url('admin/produk/edit/'.$p->id); ?>" class="btn btn-info btn-sm" title="Edit">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="<?php echo site_url('admin/produk/hapus/'.$p->id); ?>" class="btn btn-danger btn-sm" title="Hapus">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="<?php echo $p->id ?>">
                            <?php echo form_open('admin/produk/tambah_stok/'.$p->id,'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                            <?php echo validation_errors(); ?>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Tambah Stok</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id">Stok</label>
                                            <input type="number" placeholder="Stok Produk" name="stok" value="<?php echo $this->input->post('stok'); ?>" class="form-control" required>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah Stok</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
