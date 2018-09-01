<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Artikel</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Edit Artikel</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit Artikel
            </div>
            <div class="card-body">
                <?php echo form_open('admin/artikel/edit/'.$artikel->id,'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama artikel</label>
                            <input type="text" placeholder="Nama artikel" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $artikel->nama); ?>" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label class='control-label'>Teks</label>
                            <textarea class='ckeditor' id='ckeditor' name='teks'><?php echo ($this->input->post('teks') ? $this->input->post('teks') : $artikel->teks); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if($artikel->gambar != ""){ ?>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px; position:relative;">
                                <div class="hapus-gambar">
                                    <a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="<?php echo base_url('admin/artikel/hapusgambar/'.$artikel->id) ?>" onclick="return hapusgambar()">
                                        <i class="icon-remove icon-white"></i>
                                    </a>
                                </div>
                                <img src="<?php echo base_url('upload/artikel/'.$artikel->gambar) ?>">
                            </div>                                      
                        </div>
                        <?php } else { ?>
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
                        <?php } ?>

                        <!-- <div class="form-group">
                            <label for="id">Penulis</label>
                            <input type="text" placeholder="Penulis" name="penulis" value="<?php //echo ($this->input->post('penulis') ? $this->input->post('penulis') : $artikel->penulis); ?>" class="form-control" required>
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
