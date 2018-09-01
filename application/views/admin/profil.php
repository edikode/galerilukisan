<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Profil</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Edit Profil</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit Profil
            </div>
            <div class="card-body">
                <?php echo form_open('admin/profil/edit/'.$profil->id,'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama profil</label>
                            <input type="text" placeholder="Nama profil" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $profil->nama); ?>" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label class='control-label'>Teks</label>
                            <textarea class='ckeditor' id='ckeditor' name='teks'><?php echo ($this->input->post('teks') ? $this->input->post('teks') : $profil->teks); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if($profil->gambar != ""){ ?>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px; position:relative;">
                                <div class="hapus-gambar">
                                    <a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="<?php echo base_url('admin/profil/hapusgambar/'.$profil->id) ?>" onclick="return hapusgambar()">
                                        <i class="icon-remove icon-white"></i>
                                    </a>
                                </div>
                                <img src="<?php echo base_url('upload/profil/'.$profil->gambar) ?>">
                            </div>  
                            <a href="<?php echo site_url('admin/profil/hapusgambar/'.$profil->id) ?>" class="btn btn-danger">Hapus Gambar</a>                                    
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

                        <div class="form-group">
                            <label for="id">Telepon</label>
                            <input type="text" placeholder="Telepon" name="telepon" value="<?php echo ($this->input->post('telepon') ? $this->input->post('telepon') : $profil->telepon); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id">Email</label>
                            <input type="text" placeholder="Email" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $profil->email); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id">Facebook</label>
                            <input type="text" placeholder="Facebook" name="facebook" value="<?php echo ($this->input->post('facebook') ? $this->input->post('facebook') : $profil->facebook); ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <!-- <a href="<?php //echo base_url('admin/profil') ?>"  class="btn btn-danger">Kembali</a> -->
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
