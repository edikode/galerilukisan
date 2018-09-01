<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Produk</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Tambah Produk</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tambah Produk
            </div>
            <div class="card-body">
                <?php echo form_open('admin/produk/tambah','role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama Produk</label>
                            <input type="text" placeholder="Nama Produk" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label class='control-label'>Teks</label>
                            <textarea class='ckeditor' id='ckeditor' name='teks'></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px;"><img src="<?php echo base_url(); ?>assets/admin/img/400x300.jpg" alt="" class="img-thumbnail"/>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
                            <div style="margin-left: -10px">
                                <span class="btn btn-file">
                                    <span class="fileupload-new btn btn-primary">Pilih Gambar</span>
                                    <span class="fileupload-exists btn btn-primary">Ganti</span>
                                    <input type="file" name="gambar">
                                </span>
                                <a href="#" class="btn fileupload-exists btn-danger" data-dismiss="fileupload">
                                    Hapus
                                </a>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="id">Harga</label>
                            <input type="text" placeholder="Harga" name="harga" value="<?php //echo $this->input->post('harga'); ?>" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label for="id">Kategori</label>
                            <select name="kategori_id" class="form-control" required="">
                                <option value="">--- Pilih Kategori ---</option>
                                <?php foreach ($kategori as $kat) { ?>
                                    <option value="<?php echo $kat->id ?>"><?php echo $kat->nama; ?></option>    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran</label>
                            <select name="ukuran_id" id="ukuran" class="form-control" required>
                                <option value="">Pilih Ukuran</option>
                                <?php foreach ($ukuran as $u): ?>
                                    <option value="<?php echo $u->id ?>"><?php echo $u->ukuran; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('admin/produk') ?>"  class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>