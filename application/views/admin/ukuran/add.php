<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Ukuran Produk</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Ukuran Produk</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tambah Ukuran Produk
            </div>
            <div class="card-body">
                <?php echo form_open('admin/ukuran/tambah','role="form" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" id="ukuran" placeholder="contoh: 40x50" name="ukuran" value="<?php echo $this->input->post('ukuran'); ?>" class="form-control limited" maxlength="25" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="text" id="berat" placeholder="satuan Kg" name="berat" value="<?php echo $this->input->post('berat'); ?>" class="form-control limited" maxlength="25" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('admin/ukuran') ?>"  class="btn btn-danger">Kembali</a>
                        
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>