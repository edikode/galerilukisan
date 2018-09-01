<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> User</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Tambah User</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tambah User
            </div>
            <div class="card-body">
                <?php echo form_open('admin/user/tambah','role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="first_name">Nama User</label>
                            <input type="text" placeholder="Nama User" id="first_name" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Password" id="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Ulangi Password</label>
                            <input type="password" placeholder="Ulangi Password" id="password_confirm" name="password_confirm" value="<?php echo $this->input->post('password_confirm'); ?>" class="form-control" required>
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
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('admin/user') ?>"  class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>