<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Video</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Video</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tambah Video
            </div>
            <div class="card-body">
                <?php echo form_open('admin/video/tambah','role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="id">Nama Video</label>
                        <input type="text" placeholder="Nama video" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control limited" maxlength="25" required>
                    </div>
                    <div class="form-group">
                        <label for="id">Video</label>
                        <input type="file" placeholder="gambar" name="gambar" class="form-control limited" maxlength="25" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('admin/video') ?>"  class="btn btn-danger">Kembali</a>
                        
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>