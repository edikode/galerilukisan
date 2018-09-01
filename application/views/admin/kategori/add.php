<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Kategori Produk</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Kategori Produk</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tambah Kategori Produk
            </div>
            <div class="card-body">
                <?php echo form_open('admin/kategori/tambah','role="form" class="form-horizontal"'); ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>

                    <input type="text" placeholder="Text Field" id="form-field-20" class="form-control limited" maxlength="40">
                    
                    <div class="form-group">
                        <label for="id">Nama Kategori</label>
                        <input type="text" placeholder="Nama Kategori" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control limited" maxlength="25" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('admin/kategori') ?>"  class="btn btn-danger">Kembali</a>
                        
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>