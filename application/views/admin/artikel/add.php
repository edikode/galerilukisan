<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Artikel</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Tambah Artikel</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tambah Artikel
            </div>
            <div class="card-body">
                <?php echo form_open('admin/artikel/tambah','role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama Artikel</label>
                            <input type="text" placeholder="Nama artikel" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" required>
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
                            <label for="id">Penulis</label>
                            <input type="text" placeholder="Penulis" name="penulis" value="<?php //echo $this->input->post('penulis'); ?>" class="form-control" required>
                        </div> -->
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('admin/artikel') ?>"  class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>